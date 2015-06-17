<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FincaForm;
use Auth;
use Illuminate\Support\Facades\Validator;
use Input;
use Redirect;

use Session;


class FincaController extends Controller {

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
		return view("finca.index");
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view("finca.create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)

	{
		$rules =array(


			'nombre'	 		 	=> 'required',	
			'representante'  		=> 'required',
			'certficadoOperacion'   => 'required',			
			'direcion'       		=> 'required',
			//'marca'					=> 'required|mimes:jpeg'
			
			

			);

		$this->validate($request,$rules);



		
		$finca = new \App\Finca($request->all());
		$id_users= Auth::id(); 
		$finca->idUser = $id_users; 
		$finca->latitud = "120";
		$finca->longitud = "120";
		
		$file = array('image' => Input::file('image'));
		$destinationPath = 'img/fierro'; 
		$extension = Input::file('image')->getClientOriginalExtension();
		$fileName = rand(11111,99999).'.'.$extension;
		Input::file('image')->move($destinationPath, $fileName); 
		$finca->marca = $fileName;
      	$finca->save(); 

		/*
		$finca = new \App\Finca;
		$id_users= Auth::id(); 
		$finca->idUser = $id_users; 
		$finca->nombre = \Request::input('nombre');
		$finca->direcion = \Request::input('direcion');

		$finca->latitud = "120";
		$finca->longitud = "120";

		$finca->representante = \Request::input('representante');
		$finca->certficadoOperacion = \Request::input('certficadoOperacion');
		$finca->explotacion = \Request::input('explotacion');

		$file = array('image' => Input::file('image'));
		$destinationPath = 'img/fierro'; 
		$extension = Input::file('image')->getClientOriginalExtension();
		$fileName = rand(11111,99999).'.'.$extension;
		Input::file('image')->move($destinationPath, $fileName); 
		$finca->marca = $fileName;
      	$finca->save(); */






		
		/*
		$file = array('image' => Input::file('image'));
  // setting up rules
  		$rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
  // doing the validation, passing post data, rules and the messages
  		$validator = Validator::make($file, $rules);
  		if ($validator->fails()) {
    // send back to the page with the input data and errors
    		return Redirect::to('finca')->withInput()->withErrors($validator);
  		}
  		else {
    // checking file is valid.
    	if (Input::file('image')->isValid()) {
    		  $destinationPath = 'img/fierro'; // upload path
      	$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
      	$fileName = rand(11111,99999).'.'.$extension; // renameing image
      	Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
      // sending back with message

      	$finca->marca = $fileName;
      	$finca->save();
      	Session::flash('success', 'Upload successfully'); 
      	return redirect('finca/create')->with('message', 'Registro Guardado');
    	}
    	else {
      // sending back with error message.
      	Session::flash('error', 'uploaded file is not valid');
     return redirect('finca/create')->with('message', 'Error');




      	
    }
  }
  */
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
