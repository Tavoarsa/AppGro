<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Validator;
use Input;
use Redirect;
use Mail;

use App\Farm;
use App\Defoult;


use Session;

class FarmController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		
		//$user=Auth::id();

		$farms = Farm::where('idUser',Auth::id())-> get();
		
		

		return view('farms.index', compact('farms'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view("farms.create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)

	{
		$rules =array(
			'name'	 		 		=> 'required',	
			'agent'  				=> 'required',
			'operationCertificate'  => 'required',			
			'address'       		=> 'required'
			);

		$this->validate($request,$rules);

		

		$farm = new \App\Farm($request->all());
		$id_users= Auth::id(); 
		$farm->idUser = $id_users; 
		

		if (Input::hasFile('patent')) {

		$file = Input::file('patent');//Creamos una instancia de la libreria instalada
		$patent = \Image::make(\Input::file('patent'));//Ruta donde queremos guardar las imagenes
		$path = 'img/patent/';			
			// Cambiar de tamaño
		$patent -> resize(450, 450);
		$patent -> save($path . $file -> getClientOriginalName());	
		$farm->patent = $file -> getClientOriginalName();;
      	$farm->save(); 

      	return redirect() -> route('farm.index');
      	}
      	$patent='patent';	     

      	$default = Defoult::where('name', $patent) -> pluck('image');

      	$farm->patent = $default;
      	//dd($farm->patent);
      	
      	$farm->save();
      	return redirect() -> route('farm.index');      

}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	
	

		$farms = Farm::where('id', $id) -> get();		
		return view('farms.show', compact('farms'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$farm = Farm::findOrFail($id);
		
		return view('farms.edit', compact('farm'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{

		$farm = Farm::findOrFail($id);

		$rules =array(
			'name'	 		 		=> 'required',	
			'agent'  				=> 'required',
			'operationCertificate'  => 'required',			
			'address'       		=> 'required'
			);

		$this->validate($request,$rules);
		
		
		$farm->name= $request->name;

		if (Input::hasFile('patent')) {

		$file = Input::file('patent');//Creamos una instancia de la libreria instalada
		$patent = \Image::make(\Input::file('patent'));//Ruta donde queremos guardar las imagenes
		$path = 'img/patent/';			
			// Cambiar de tamaño
		$patent -> resize(450, 450);
		$patent -> save($path . $file -> getClientOriginalName());	
		$farm->patent = $file -> getClientOriginalName();
		$farm->name= $request->name;
		$farm->agent=$request->agent;
		$farm->operationCertificate=$request->operationCertificate;
		$farm->address=$request->address;
      	$farm->save(); 

      	return redirect() -> route('farm.index');
      	}

      	$patent='farm';	     

      	$default = Defoult::where('name', $patent) -> pluck('image');

      	$farm->patent = $default;
      	$farm->name= $request->name;
		$farm->agent=$request->agent;
		$farm->operationCertificate=$request->operationCertificate;
		$farm->address=$request->address;      	
      	$farm->save();
      	return redirect() -> route('farm.index');
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
