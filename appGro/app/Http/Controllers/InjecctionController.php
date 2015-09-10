<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateInjectionRequest;
use App\Http\Controllers\Controller;

use App\Injection;
use Input;

use Illuminate\Http\Request;//inyeccion de dependencias

class InjecctionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	

	public function index()
	{	

		$injections= Injection::all();					
		return view ('injections.index',compact('injections'));	
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('injections.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

	 

	 if(Input::hasFile('image'))
	 {
	 	$file = Input::file('image');
	 	//Creamos una instancia de la libreria instalada   
   $image = \Image::make(\Input::file('image'));
   //Ruta donde queremos guardar las imagenes
   $path = 'img/injections/';
 
   // Guardar Original
   //$image->save($path.$file->getClientOriginalName());
   // Cambiar de tamaño
   $image->resize(450,450);
   $image->save($path.$file->getClientOriginalName());
   // Guardar
   //$image->save($path.'injec_'.$file->getClientOriginalName());
   
   //Guardamos nombre y nombreOriginal en la BD
   $injection = new Injection();
   $injection->name = Input::get('name');
   $injection->descrition= Input::get('descrition');
   $injection->image = $file->getClientOriginalName();
   $injection->save();
   
   return redirect()->route('injection.index');

	 }

	 $image = \Image::make('img/vacuna.jpg');
   //Ruta donde queremos guardar las imagenes
   $path = 'img/injections/';
 
   // Guardar Original
   //$image->save($path.$file->getClientOriginalName());
   // Cambiar de tamaño
   $image->resize(450,450);
   $image->save($path.$file->getClientOriginalName());

   
   $injection = new Injection();
   $injection->name = Input::get('name');
   $injection->descrition= Input::get('descrition');
   $injection->image = $image;
   $injection->save();
   
   return redirect()->route('injection.index');

   
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Request $request)
	{
			//dd($request->get('name'));	

			$injections= Injection::where('name','ILIKE','%'.trim($request->get(trim('name'))) .'%')->get();

			return view ('injections.show',compact('injections'));	
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$injection= Injection::findOrFail($id);
		return view('injections.edit',compact('injection'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		
		$injection= Injection::findOrFail($id);
		 if(Input::hasFile('image')){

		 	
		 $file = Input::file('image');
	 	//Creamos una instancia de la libreria instalada   
   $image = \Image::make(\Input::file('image'));
   //Ruta donde queremos guardar las imagenes
   $path = 'img/injections/';;
 
   // Guardar Original
   //$image->save($path.$file->getClientOriginalName());
   // Cambiar de tamaño
   $image->resize(450,450);
   $image->save($path.$file->getClientOriginalName());
   // Guardar
   //$image->save($path.'injec_'.$file->getClientOriginalName());
   
   //Guardamos nombre y nombreOriginal en la BD
 
   $injection->name = Input::get('name');
   $injection->descrition= Input::get('descrition');
   $injection->image = $file->getClientOriginalName();
   $injection->save();
   
   return redirect()->route('injection.index');

		 	



		 }

$file = Injection::where('id',$id)->pluck('image');	
		   
		   $injection->name = Input::get('name');
		   $injection->descrition= Input::get('descrition');
		   $injection->image = $file;
		   $injection->save();
		   
		   return redirect()->route('injection.index');

		
	 
	 
   
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
