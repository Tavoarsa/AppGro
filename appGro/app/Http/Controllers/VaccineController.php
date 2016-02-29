<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Vaccine;
use App\Defoult;
use App\Provider;

use Auth;
use Session;
	
	
use Input;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class VaccineController extends Controller {

	public function __construct() {
		$this -> middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$vaccines = Vaccine::where('idUser',Auth::id())-> get();
		return view('vaccines.index', compact('vaccines'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {

		$providers= Provider::all()->lists('name','id');
		if(count($providers)==0)
		{
			return redirect('providers')->with('status', 'Atención!!! Ingrese Un proveedor');
		}
		return view('vaccines.create',compact('providers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request) {

		$rules =array(

				'nameV'  					=> 'required',		
				'application'				=> 'required',
				'precautions'				=> 'required',
				'effects'					=> 'required',
				'size'						=> 'required',
				'price'					=> 'required|integer',
				
				);
				//dd($request->idFarm);
		$this->validate($request,$rules);
		//GET ID FARM
		$idFarm=Session::get('key');
		if (Input::hasFile('image')) {
			$file = Input::file('image');
			//Creamos una instancia de la libreria instalada
			$image = \Image::make(\Input::file('image'));
			//Ruta donde queremos guardar las imagenes
			$path = 'img/vaccines/';
			// Cambiar de tamaño
			$image -> resize(450, 450);
			$image -> save($path . $file -> getClientOriginalName());
			//Guardar imagen.
			//Guardamos nombre y nombreOriginal en la BD
			$vaccine = new Vaccine();
			if($idFarm==null){			
				$vaccine->idFarm=1;
			}else
			{
				$vaccine->idFarm=$idFarm;	
			}
			$vaccine -> idUser = Auth::id();
		
			$vaccine -> idProvider = $request->idProvider;

			$vaccine -> nameV = Input::get('nameV');
			$vaccine -> indications = Input::get('indications');
			$vaccine -> Dosage = Input::get('Dosage');
			$vaccine -> composition = Input::get('composition');
			$vaccine -> application = Input::get('application');
			$vaccine -> precautions = Input::get('precautions');
			$vaccine -> effects = Input::get('effects');
			$vaccine-> size=Input::get('size');
			$vaccine-> price =Input::get('price');
			
			$price_ml= $request->priceS/$request->size;	
			
			$vaccine-> price_ml=$price_ml;
			$vaccine-> due_date=Input::get('due_date');

			$vaccine -> image = $file -> getClientOriginalName();
			$vaccine -> save();

			return redirect() -> route('vaccine.index');

		}


			$default = 'vaccine.jpg';

			$vaccine = new Vaccine();
			if($idFarm==null){			
				$vaccine->idFarm=1;
			}else
			{
				$vaccine->idFarm=$idFarm;	
			}
			$vaccine -> idUser = Auth::id();
			$vaccine -> idProvider = $request->idProvider;

			$vaccine -> nameV = Input::get('nameV');
			$vaccine -> indications = Input::get('indications');
			$vaccine -> Dosage = Input::get('Dosage');
			$vaccine -> composition = Input::get('composition');
			$vaccine -> application = Input::get('application');
			$vaccine -> precautions = Input::get('precautions');
			$vaccine -> effects = Input::get('effects');

			$vaccine-> size=Input::get('size');
			$vaccine-> price=Input::get('price');
			//dd($request->price);
			$price_ml= $request->price/$request->size;		
			$vaccine-> price_ml=$price_ml;
			$vaccine-> due_date=Input::get('due_date');

			$vaccine -> image = $default;
			$vaccine -> save();



			return redirect() -> route('vaccine.index');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Request $request) {
		//dd($request);

			if ($request ->name == "") {

			$vaccines = Defoult::where('name', 'no_found') -> get();
			//pluck('name');
			
			//$vaccines = Vaccine::where('name', '$default') -> get();
			//dd($vaccines);

			return view('vaccines.show', compact('vaccines'));

		} else 
		{
			$vaccines = Vaccine::where('nameV', 'ILIKE', '%' . trim($request -> get(trim('name'))) . '%') -> get();
			

			if (sizeof($vaccines) == 0) {

				
				$vaccines = Defoult::where('name', 'no_found') -> get();
				
				return view('vaccines.show', compact('vaccines'));				

			}			

			

				$vaccines = Vaccine::where('nameV', 'ILIKE', '%' . trim($request -> get(trim('name'))) . '%') -> get();

				return view('vaccines.show1', compact('vaccines'));	


			

			


		}
	}

	public function show1($id) {

		$vaccines = Vaccine::where('id', $id) -> get();
		//dd($injections);
		return view('vaccines.show1', compact('vaccines'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$vaccine = Vaccine::findOrFail($id);
		//dd($vaccine);
		$providers= Provider::all()->lists('name','id');
		return view('vaccines.edit', compact('vaccine','providers'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request) {

		$vaccine = Vaccine::findOrFail($id);

		$rules =array(

				'nameV'  					=> 'required',		
				'application'				=> 'required',
				'precautions'				=> 'required',
				'effects'					=> 'required',
				'size'						=> 'required',
				'price'					=> 'required|integer',
				
				);
				//dd($request->idFarm);
		$this->validate($request,$rules);
		if (Input::hasFile('image')) {

			$file = Input::file('image');
			//Creamos una instancia de la libreria instalada
			$image = \Image::make(\Input::file('image'));
			//Ruta donde queremos guardar las imagenes
			$path = 'img/vaccines/';
			;

			// Guardar Original
			//$image->save($path.$file->getClientOriginalName());
			// Cambiar de tamaño
			$image -> resize(450, 450);
			$image -> save($path . $file -> getClientOriginalName());
			// Guardar
			//$image->save($path.'injec_'.$file->getClientOriginalName());

			//Guardamos nombre y nombreOriginal en la BD


			$vaccine -> nameV = Input::get('nameV');
			$vaccine -> indications = Input::get('indications');
			$vaccine -> Dosage = Input::get('Dosage');
			$vaccine -> composition = Input::get('composition');
			$vaccine -> application = Input::get('application');
			$vaccine -> precautions = Input::get('precautions');
			$vaccine -> effects = Input::get('effects');

			$vaccine-> size=Input::get('size');
			$vaccine-> price=Input::get('price');
			//dd($request->price);
			$price_ml= $request->price/$request->size;		
			$vaccine-> price_ml=$price_ml;
			$vaccine-> due_date=Input::get('due_date');		
			$vaccine -> image = $file -> getClientOriginalName();
			$vaccine -> save();

			return redirect() -> route('vaccine.index');

		}

		$file ='vaccine.jpg';
		

		

		$vaccine -> nameV = Input::get('nameV');
		$vaccine -> indications = Input::get('indications');
		$vaccine -> Dosage = Input::get('Dosage');
		$vaccine -> composition = Input::get('composition');
		$vaccine -> application = Input::get('application');
		$vaccine -> precautions = Input::get('precautions');
		$vaccine -> effects = Input::get('effects');
		$vaccine -> size=Input::get('size');
		$vaccine -> price=Input::get('price');
		$price_ml = $request->price/$request->size;
		$vaccine -> price_ml=$price_ml;
		$vaccine -> due_date=Input::get('due_date');	
		$vaccine -> image = $file;
		$vaccine -> save();

		return redirect() -> route('vaccine.index');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}
