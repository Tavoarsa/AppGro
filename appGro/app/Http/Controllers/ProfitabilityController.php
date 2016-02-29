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
		
		
		
		

		
		


		



	
		
		
		$milk_productions= MilkProduction::where('milk_productions.idUser',Auth::id())
									 ->where('milk_productions.idAnimal',$request->id)									 
						      	     ->join('animals','animals.id','=','milk_productions.idAnimal')						      	     
						      	     ->select('animals.nombre','milk_productions.date','milk_productions.morning_production','milk_productions.later_production','milk_productions.total_production','milk_productions.price_production')
						  			 ->get();//dd($milk_productions);
		
		foreach ($milk_productions as $milk_production) {

			$nombre[] = $milk_production->nombre ;
			$date[]=$milk_production->date;
			$morning_production[]=$milk_production->morning_production;
			$later_production[]=$milk_production->later_production;
}

/*$fechaNacimiento=$request->fechaNacimiento;
$fechaNacimiento=str_limit($fechaNacimiento,2,$end='');
$da0=str_limit($date0 = array_pull($date, '0'), 2,$end = '');
//dd($date);
foreach ($date as $da) {

	$d=$da[0];dd($d);
}


	
	//dd($da0);


	foreach ($date as $dat) {
		//dd($dat);

		//$date0[]=array_pull($dat,'0');dd($date0);
		
	}
*/

	//dd($request->fechaNacimiento);

	if(count($milk_productions)==0){
		
		return redirect()->back()->withInput();

	}else{
		if(count($date)<=3){
			return redirect()->back()->withInput();

		}
		$finances = Lava::DataTable();

$finances->addDateColumn('dd')
         ->addNumberColumn('Mañana')
         ->addNumberColumn('Tarde')         
         ->setDateTimeFormat('d')
         ->addRow([$da0=str_limit($date0 = array_pull($date, '0'), 2,$end = ''), $mor0=array_pull($morning_production,'0'),$la0=array_pull($later_production,'0')])
         ->addRow([$da1=str_limit($date0 = array_pull($date, '1'), 2,$end = ''), $mor0=array_pull($morning_production,'1'),$la0=array_pull($later_production,'1')])
         ->addRow([$da2=str_limit($date0 = array_pull($date, '2'), 2,$end = ''), $mor0=array_pull($morning_production,'2'),$la0=array_pull($later_production,'2')])
         ->addRow([$da3=str_limit($date0 = array_pull($date, '3'), 2,$end = ''), $mor0=array_pull($morning_production,'3'),$la0=array_pull($later_production,'3')]);
         

Lava::ColumnChart('MilkProduction', $finances, [
    'title' => 'Producción Lechera',
    'titleTextStyle' => [
        'color'    => '#eb6b2c',
        'fontSize' => 14
    ]
]);

	}
    return view('profitability.milk_production');
    
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
