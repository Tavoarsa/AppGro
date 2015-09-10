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
		$animal= Animal::all();
		return view('animal.index',compact('$animal'));
	}

	public function add(Request $request)
	{	
			$rules =array(


			'numeroAnimal'	 		 	=> 'required',	
			'nombre'  					=> 'required',
			'idPadre'   				=> 'required|integer',			
			'idMadre'       			=> 'required|integer',
			'raza'						=> 'required',
			'genero'					=> 'required',
			'fechaNacimiento'			=> 'required',
			'pesoNacimiento'			=> 'required|integer',
			'fechaMuerte'				=> 'required',
			'observaciones'				=> 'required',
			'image'					 	=> 'required|mimes:jpeg,bmp,png',		

			);


		$this->validate($request,$rules);
		$animal = new \App\Animal($request->all());
		$id_users= Auth::id(); 
		$animal->idUser = $id_users;

		$file = Request::file('image');
		$extension = $file->getClientOriginalExtension();
		Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
		$animal = new Animal();
		$animal->save();

		return redirect('animal.index');


	
		
		
	}

	public function get($nombre){
	
		$animal = Animal::where('nombre', '=', $nombre)->firstOrFail();
		$file = Storage::disk('local')->get($animal->nombre);

		return (new Response($file, 200))
              ->header('Content-Type', $animal->nombre);
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
