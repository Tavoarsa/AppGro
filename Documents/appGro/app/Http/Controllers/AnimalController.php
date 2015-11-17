<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Input;
use Session;
use Redirect;
use App\Animal;
use App\Defoult;

class AnimalController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{		
		$animals= Animal::all();
		return view('animals.index',compact('animals'));
	}
		public function create()
	{
		$madre= Animal::where('genero', 'hembra') -> lists('nombre','id');
		$padre= Animal::where('genero', 'macho') -> lists('nombre','id');
		$selected=array();
		
		//dd($madre);

		return view("animals.create",compact('madre','selected','padre'));
	}


	public function store(Request $request)
	{	
			$rules =array(


			'numeroAnimal'	 		 	=> 'required',	
			'nombre'  					=> 'required',
			//'idPadre'   				=> 'required|integer',			
			//'idMadre'       			=> 'required|integer',
			'raza'						=> 'required',
			'genero'					=> 'required',
			'fechaNacimiento'			=> 'required',
			'pesoNacimiento'			=> 'required|integer',
			'fechaMuerte'				=> 'required',
			'observaciones'				=> 'required',
			//'image'					 	=> 'required|mimes:jpeg,bmp,png',		

			);



		$this->validate($request,$rules);
		


		
		

		$animal = new \App\Animal($request->all());

		$id_users= Auth::id(); 
		$madre=$request->madre;
		$padre=$request->padre;
		//dd($madre);

		$animal->idMadre= $madre;
		$animal->idPadre= $padre;

		$animal->idUser = $id_users;

		if (Input::hasFile('image')) {
			//dd('hola');

		$file = Input::file('image');//Creamos una instancia de la libreria instalada
		$image = \Image::make(\Input::file('image'));//Ruta donde queremos guardar las imagenes
		$path = 'img/animal/';			
			// Cambiar de tamaño
		$image -> resize(450, 450);
		$image -> save($path . $file -> getClientOriginalName());	
		$animal->image = $file -> getClientOriginalName();

		
		
      	$animal->save(); 

      	return redirect() -> route('animal.index');
      	}

      	$image='animal';	     

      	$default = Defoult::where('name', $image) -> pluck('image');

      	$animal->image = $default;
      	//dd($farm->patent);
      	
      	$animal->save();
      	return redirect() -> route('animal.index');

	
		
		
	}

	
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id = null)
	{
		chmod($this->folder.'/'.$id, 0777);

		if (unlink($this->folder.'/'.$id)) {
			Session::flash('message','Eliminado correctamente');
			Session::flash('class','success');
		} else {
			Session::flash('message','Error al eliminar');
			Session::flash('class','danger');
		}

		return Redirect::to('/');
	}



}
