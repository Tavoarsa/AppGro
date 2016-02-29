<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Cookie;

use Auth;
use Lava;
use Input;
use App\Provider;
use App\Medicine;
use Session;
use App\Animal;
use App\Food_Supplement;
use App\DietaryControl;
use App\MilkProduction;
use Khill\Lavacharts\Lavacharts;

class ProfitabilityController extends Controller {

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
		$idFarm=Session::get('key');
		if($idFarm==null)
		{			
			$idFarm=1;
		}else
		{
			$idFarm=$idFarm;	
		}
		$animals= Animal::where('idUser',Auth::id())
						  ->where('idFarm',$idFarm)	
						  ->get();
			//dd($animals);
		return view('profitability.index',compact('animals'));
		
	}


	public function milk_production(Request $request)
	{
		$animals= Animal::where('idUser',Auth::id())
						  ->where('id',$request->id)	
						  ->lists('nombre');
		$animals=array_pull($animals,0);
		
		$milk_productions= MilkProduction::where('milk_productions.idUser',Auth::id())
									 ->where('milk_productions.idAnimal',$request->id)									 
						      	     ->join('animals','animals.id','=','milk_productions.idAnimal')						      	     
						      	     ->select('animals.nombre','milk_productions.date','milk_productions.morning_production','milk_productions.later_production','milk_productions.total_production','milk_productions.price_production')
						  			 ->get();//dd($milk_productions);

		$dietary_controls= DietaryControl::where('dietary_controls.idUser',Auth::id())
									 ->where('dietary_controls.idAnimal',$request->id)									 
						      	     ->join('animals','animals.id','=','dietary_controls.idAnimal')						      	     
						      	     ->select('animals.nombre','dietary_controls.value')
						  			 ->get();//dd($dietary_controls);
		if(count($milk_productions)==0 || count($dietary_controls)==0){



			return redirect('profitability')->with('status', 'Noy hay ningún registro que mostrar');
		}

		foreach ($milk_productions as $milk_production) 
		{

			$nombre[] = $milk_production->nombre ;
			$date[]=$milk_production->date;
			$morning_production[]=$milk_production->morning_production;
			$later_production[]=$milk_production->later_production;
			$total_production[]=$milk_production->total_production;
			$price_production[]=$milk_production->price_production;

		}
			foreach ($dietary_controls as $dietary_control) 
		{
			
			$value[]=$dietary_control->value;

		}

$total_production=array_sum($total_production);//Total en kilos de leche
//$promedio_dia=count($price_production);
$promedio_dia=($total_production)/(count($price_production)); //dd($promedio_dia);//kilos por dia.
$ganancia_produccion=array_sum($price_production);//ganancia total
$ganacia_dia= $ganancia_produccion/count($price_production);

$total_gastos= array_sum($value);//gatos total.
$gatos_dia=$total_gastos/count($value);

$balance_total=$ganancia_produccion-$total_gastos;
$balance_diario=$ganacia_dia-$gatos_dia;//dd($balance_total);
if($balance_total<0){
	$estado="Animal No Rentable.";
}
$estado="Animal Rentable";	
		
$reasons = Lava::DataTable();

$reasons->addStringColumn('Reasons')
        ->addNumberColumn('Percent')
        ->addRow(['Ingresos', $ganancia_produccion])        
        ->addRow(['Gastos', $total_gastos]);

Lava::PieChart('IMDB', $reasons, [
    'title'  => 'Rentabilida Animal ',
    'is3D'   => true,
    'slices' => [
        ['offset' => 0.2],
        ['offset' => 0.25],
        ['offset' => 0.3]
    ]
]);
         



	
    return view('profitability.milk_production',compact('animals','estado','gatos_dia','total_gastos','ganacia_dia','ganancia_produccion','promedio_dia','total_production'));
    
	}

	

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	
	/*

	public function createProvider()
	{

		return view('providers.store');

	}

	public function storeProvider(Request $request)
	{
		$provider = new Provider();
		$provider->idUser=Auth::id();
		$provider->name=Input::get('name');
		$provider->address=Input::get('address');
		$provider->email=Input::get('email');
		$provider->phone=Input::get('phone');
		$provider->service=Input::get('service');
		$provider->observation=Input::get('observation');
		$provider->save();
		$providers= Provider::all();
		return view("providers.show",compact('providers'));

	}
	public function showProvider()
	{

		$providers= Provider::all();

		return view("providers.show",compact('providers'));
		
	}

	public function createMedicine()
	{
		$providers= Provider::all()->lists('name','id');
		$selected=array();
		//dd($providers);
		return view("medicines.store",compact('providers','selected'));


	}


	public function storeMedicine(Request $request)
	{
		$medicine = new Medicine();
		$medicine->idUser=Auth::id();
		

		$medicine->idProvider=Input::get('providerName');
		$medicine->nameProduct=Input::get('nameProduct');
		
		$medicine->size=Input::get('size');
		$medicine->price=Input::get('price');

		$price_ml=$request->price/$request->size;		
		$medicine->price_ml=$price_ml;
		$medicine->due_date=Input::get('due_date');
		$medicine->save();

		$medicines= Medicine::all();

		return view("medicines.show",compact('medicines'));

	}

	public function showMedicine()
	{

		$medicines= Medicine::all();

		return view("medicines.show",compact('medicines'));
		
	}

		public function storeFood_Supplement(Request $request)
	{
		$food_supplement= new Food_Supplement();
		$food_supplement->idUser=Auth::id();
		$food_supplement->idProvider=Provider::where('id',$request->name)->pluck('id');
		$food_supplement->nameProduct=Input::get('nameProduct');
		$food_supplement->weight=Input::get('weight');
		$food_supplement->price_kg=Input::get('price_kg');
		$food_supplement->due_date=Input::get('due_date');
		$food_supplement->save();


	}

	public function storePrice_kilo(Request $request)
	{
		$price_kg= new Price_Kilo();
		$price_kg->idUser=Auth::id();
		$price_kg->value=Input::get('value');
		$price_kg->date=Input::get('date');
	}
	public function storePrice_liter(Request $request)
	{
		$price_lt= new Price_liter();
		$price_lt->idUser=Auth::id();
		$price_lt->value=Input::get('value');
		$price_lt->date=Input::get('date');
	}
	public function milk_productions(Request $request)
	{
		$milkProduction= new MilkProduction();
		$milkProduction->idUser=Auth::id();
		$milkProduction->idAnimal=Animal::where('id',$request->name)->pluck('id');
		$milkProduction->morning_production=Input::get('date');
		$milkProduction->later_production=Input::get('date');
		$milkProduction->total_production=Input::get('date');
		$milkProduction->price_production=Input::get('date');
		$milkProduction->save();
	}
	public function meat_productions(Request $request)
	{
		$meat_productions= new MilkProduction();
		$meat_productions->idUser=Auth::id();
		$meat_productions->idAnimal=Animal::where('id',$request->name)->pluck('id');
		$meat_productions->idAnimal=Weight::where('id',$request->id)->pluck('id');//ultimo peso
		$meat_productions->dateWeight=Input::get('dateWeight');			
		$meat_productions->save();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
