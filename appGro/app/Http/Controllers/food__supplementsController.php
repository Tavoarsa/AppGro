<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Provider;
use App\Food_Supplement;
use App\Defoult;
use Auth;
use Session;	
use Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\DietaryControl;

class food__supplementsController extends Controller {

	public function __construct() {
		$this -> middleware('auth');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{		
		
		$food__supplements = Food_Supplement::where('idUser',Auth::id())-> get();
		return view('food__supplements.index', compact('food__supplements'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$providers= Provider::all()->lists('name','id');
		if(count($providers)==0)
		{
			return view('providers.store');
		}
		return view('food__supplements.create',compact('providers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$rules =array(

				'typeProduct'  				=> 'required',		
				'nameProduct'				=> 'required',
				'weight'					=> 'required',				
				'price'						=> 'required|integer',
				
				
				);
				//dd($request->idFarm);
		$this->validate($request,$rules);	
			$idFarm=Session::get('key');
			$food__supplement = new Food_Supplement();
			if($idFarm==null){			
				$food__supplement->idFarm=1;
			}else
			{
				$food__supplement->idFarm=$idFarm;	
			}			
			$food__supplement -> idUser = Auth::id();
			$food__supplement -> idProvider = $request->idProvider;
			$food__supplement -> typeProduct=Input::get('typeProduct');
			$food__supplement -> nameProduct = Input::get('nameProduct');
			$food__supplement -> weight = Input::get('weight');
			$food__supplement -> price = Input::get('price');
			$price_kg= $request->price/$request->weight;
			$food__supplement -> price_kg=$price_kg; 				
			$food__supplement -> due_date = Input::get('due_date');	
			
			$food__supplement -> save();

			return view('food__supplements.index');	

	}

	/**
	 * Busca por nombre.
	 *
	 * @param  Request  $request
	 * @return 
	 */
	public function show(Request $request)
	{
		
		
		if ($request->nameProduct == "") 
		{
			$food__supplements =  Defoult::where('name', 'no_found') -> get();
			return view('food__supplements.show', compact('food__supplements'));
		} else 
		{
			$food__supplements = Food_Supplement::where('nameProduct', 'ILIKE', '%' . trim($request -> get(trim('nameProduct'))) . '%') -> get();

			if (sizeof($food__supplements) == 0) {				
				$food__supplements =  Defoult::where('name', 'no_found') -> get();
				
				return view('food__supplements.show', compact('food__supplements'));				
			}						

			$food__supplements = Food_Supplement::where('nameProduct', 'ILIKE', '%' . trim($request -> get(trim('nameProduct'))) . '%') -> get();
			return view('food__supplements.show1', compact('food__supplements'));	
		}
	}

	public function show1($id) {

		$food__supplements = Food_Supplement::where('id', $id) -> get();		
		return view('food__supplements.show1', compact('food__supplements'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {

		$food__supplements = Food_Supplement::findOrFail($id);
		$providers= Provider::all()->lists('name','id');
		return view('food__supplements.edit', compact('food__supplements','providers'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request) {

		$food__supplement = Food_Supplement::findOrFail($id);
		$rules =array(

				'typeProduct'  				=> 'required',		
				'nameProduct'				=> 'required',
				'weight'					=> 'required',				
				'price'						=> 'required|integer',
				
				
				);
				//dd($request->idFarm);
		$this->validate($request,$rules);

		
			
			$food__supplement -> idProvider = $request->idProvider;
			$food__supplement -> typeProduct=Input::get('typeProduct');
			$food__supplement -> nameProduct = Input::get('nameProduct');
			$food__supplement -> weight = Input::get('weight');
			$food__supplement -> price = Input::get('price');
			$price_kg= $request-> price/$request->weight;
			$food__supplement -> price_kg=$price_kg; 				
			$food__supplement -> due_date = Input::get('due_date');				
			$food__supplement -> save();

			return redirect() -> route('food__supplement.index');
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
