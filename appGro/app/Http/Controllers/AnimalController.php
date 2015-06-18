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
		return view('animal.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view("animal.create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	public function cargarPadre()
	{
		$padre = Animal::getPadre();
		return Response::json($padre);
	}

	public function store(Request $request)
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
			'foto'					 	=> 'required|mimes:jpeg,bmp,png',		

			);

		$this->validate($request,$rules);

		$animal = new \App\Animal($request->all());
		$id_users= Auth::id(); 
		$animal->idUser = $id_users;
		         						  							
		$file = array('image' => Input::file('image'));
		$destinationPath = 'img/fierro'; 
		$extension = Input::file('image')->getClientOriginalExtension();
		$fileName = rand(11111,99999).'.'.$extension;
		Input::file('image')->move($destinationPath, $fileName); 
		$animal->image = $fileName;
      	$animal->save(); 
 
		return redirect('animal/create')->with('message', 'Registro Guardado');
		
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
	public function destroy($id)
	{
		//
	}

}
