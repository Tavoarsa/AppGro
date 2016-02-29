<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection ;
use Auth;
use Input;
use Session;
use Redirect;
use App\Animal;
use App\Defoult;
use App\Farm;
use App\Disease;
use App\Injection;
use App\Vaccine;
use App\Calendar;
use App\DB;
use App\Food_Supplement;
use App\DietaryControl;
use App\VaccinationControl;
use App\InjecctionControl;
use App\Weight;
use App\MilkProduction;
use App\FertilizacionInvitro;
use App\InseminacionArtificial;
use App\MontaNatural;
use App\TrasferenciaEmbriones;
use Illuminate\Support\Facades\Mail;

use Response;


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
					
			return view('animals.index',compact('animals'));
	}

	public function create_fiv()	{

		

		return view("animals.create_fiv");
	}
	public function create_mt()	{		
		

		return view("animals.create_mt");
	}
	public function create_te()	{		
		

		return view("animals.create_te");
	}
	public function create_ia()	{		
		

		return view("animals.create_ia");
	}



	public function store(Request $request)
	{
		
		//Validaciones
		$rules =array(				
						'nombre'  					=> 'required',		
						'raza'						=> 'required',
						'genero'					=> 'required',
						'fechaNacimiento'			=> 'required',						
						'caracteristicas'			=> 'required',	
					  );
		$farm=\DB::table('farms')                    
	                    ->Where('id',Session::get('key'))
	                    ->pluck('name');

		$this->validate($request,$rules);
		$carbon = new \Carbon\Carbon();//Obtener Fecha
		$date = $carbon->now();	
		$date = $date->format('Y');//Obtenemos Año			
		$id_users= Auth::id();

		$animal = new Animal();
		$animal->idUser = $id_users;
		$idFarm=Session::get('key');
		if($idFarm==null)
		{		
			$animal->idFarm=1;
		}else{
			$animal->idFarm=$idFarm;	
		}
		$animal->numeroAnimal= $request->nombre.''.Session::get('key') .''.$date;
		$animal->nombre= $request->nombre;			
		$animal->raza = $request->raza;
		$animal->genero= $request->genero;
		$animal->fechaNacimiento= $request->fechaNacimiento;					
		$animal->caracteristicas= $request->caracteristicas;
			//Validacion de imagen 
		if (Input::hasFile('image')) 
		{	
			$file = Input::file('image');//Creamos una instancia de la libreria instalada
			$image = \Image::make(\Input::file('image'));//Ruta donde queremos guardar las imagenes
			$path = 'img/animal/';			
			// Cambiar de tamaño
			$image -> resize(450, 450);
			$image -> save($path . $file -> getClientOriginalName());	
			$animal->image = $file -> getClientOriginalName();
		  	//$animal->save(); 
	      	//return redirect() -> route('animal.index');
	     }else
	     {
	     	//Si no hay imagen, se guarda una por defecto
	      	$image='animal';  
	      	$default = 'animal.jpg';
	      	$animal->image = $default;	        	
	      	//$animal->save();
	     }

	     $animal->save();

	     if($request->fiv=="fiv"){

	     	$fertilizacion_invitro= new FertilizacionInvitro();
	     	$fertilizacion_invitro->padre=$request->padre;
	     	$fertilizacion_invitro->madre_donadora=$request->madre_donadora;
		 	$fertilizacion_invitro->madre_receptora=$request->madre_receptora;
		 	$animal->procedencia()->save($fertilizacion_invitro);
	     }

	     if($request->ia=='ia'){
	     	$inseminacion_artificial= new InseminacionArtificial();
	     	$inseminacion_artificial->padre=$request->padre;
	     	$inseminacion_artificial->madre=$request->madre;
	     	$animal->procedencia()->save($inseminacion_artificial);
	     }
	     if($request->mt=='mt'){
	     	$monta_natural= new MontaNatural();
	     	$monta_natural->padre=$request->padre;
	     	$monta_natural->madre=$request->madre;
	     	$animal->procedencia()->save($monta_natural);
	     }
	     if($request->te=='te'){

	     	$trasferencia_embriones= new TrasferenciaEmbriones();
	     	$trasferencia_embriones->padre=$request->padre;
	     	$trasferencia_embriones->madre_donadora=$request->madre_donadora;
		 	$trasferencia_embriones->madre_receptora=$request->madre_receptora;
	     	$animal->procedencia()->save($trasferencia_embriones);
	     }
	 	
	     

	     

	      	return redirect() -> route('animal.index');

	
		
		
	}

	public function control_animal($id)
	{
			$animals= Animal::where('id',$id)->get();
			$nombre=\DB::table('animals')                    
	                    ->Where('id',$id)
	                    ->pluck('nombre');
	                    //dd($nombre);
			

			$genero= \DB::table('animals')                    
	                    ->Where('id',$id)
	                    ->lists('genero','nombre');
		//dd($animals);

			return view('animals.control_animal',compact('nombre','animals'));
	}

	public function registro_sanitario_vaccine($id)
	{
		
			$animals= Animal::where('id',$id)->lists('nombre','id');
			
			$disease= Disease::all()->lists('name','id');

			$vaccine= Vaccine::all()->lists('nameV','id');

		if(count($animals)==0 || count($disease)==0 || count($vaccine)==0){
			

			return redirect('veterinaria')->with('status', 'Atención!!! Ingrese registros en Veterinaria');
		}	
		
			return view('animals.registro_sanitario_vaccine',compact('animals','disease','vaccine'));
	}

		public function ejecutar_vacunas(Request $request)
	{
		
		$rules =array(

			
			'dateApplication'			=> 'required',
			'boosterInjection'			=> 'required',
			'dose'						=> 'required',	
			'responsible'				=> 'required',			

			);

			$this->validate($request,$rules);


		
			$dateA=	Input::get('dateApplication');
			$dateApplication=date(microtime(substr($dateA, 6, 4)."-".substr($dateA, 3, 2)."-".substr($dateA, 0, 2)." " .substr($dateA, 10, 6)) * 10000);
			$boosterI=	Input::get('boosterInjection');
			$boosterInjection=date(microtime(substr($dateA, 6, 4)."-".substr($dateA, 3, 2)."-".substr($dateA, 0, 2)." " .substr($dateA, 10, 6)) * 10000);
			$price=Vaccine::where('id',$request->vaccineName)->pluck('price_ml');
			
			
			$vc= new VaccinationControl();

			$idFarm=Session::get('key');

			$food__supplement = new Food_Supplement();
			if($idFarm==null){			
				$vc->idFarm=1;
			}else
			{
				$vc->idFarm=$idFarm;	
			}
			$vc->idUser=Auth::id();
			$vc->animalName=$request->animalName;
		
			$vc->diseaseName=$request->diseaseName;
			$vc->vaccineName=$request->vaccineName;
			$vc->dateApplication=$request->dateApplication;
			
			$vc->dose= $request->dose;
			$vc->value=$request->dose*$price;
			$vc->responsible=$request->responsible;
			$vc->boosterInjection=$request->boosterInjection;	
				
			$vc->save();


			$event = new Calendar();
			$event ->idUser=Auth::id();
			if($idFarm==null){			
				$event->idFarm=1;
			}else
			{
				$event->idFarm=$idFarm;	
			}
			$event ->title ='Vacunacion';
			$event ->body = 'Programada'; 
			$event ->url = 'http://localhost:8000/vaccinationControl';
			$event ->class = 'Preventivo';
			$event ->start = $dateApplication;
			$event ->end = $boosterInjection;			

			$event->save();

			$animal= Animal::where('id',$request->animalName)->lists('nombre');
			$vaccine= Vaccine::where('id',$request->vaccineName)->lists('nameV');
			$disease= Disease::where('id',$request->diseaseName)->lists('name');			
			$animal=array_pull($animal,0);
			$vaccine=array_pull($vaccine,0);
			$disease=array_pull($disease,0);

			$data = array(

        'name' => $animal,
        'vaccine'=>$vaccine,
        'disease'=>$disease,
        'boosterInjection'=>$request->boosterInjection,

    );
			
		

    Mail::send('emails.vaccine', $data, function ($message) {

    	$email=Auth::user();
		$correo= array_pull($email,'email');//dd($correo);

        $message->from('appgrocr@gmail.com', 'Evento de Vacunación');

        $message->to($correo)->cc('appgrocr@gmail.com')->subject('Notificaciones Appgro.com');


    });
				
			return redirect() -> route('animal.index');


	}
	public function registro_sanitario_injection($id)
	{
		
			$animals= Animal::where('id',$id)->lists('nombre','id');
			
			$disease= Disease::all()->lists('name','id');

			$injection= Injection::all()->lists('name','id');
			if(count($animals)==0 || count($disease)==0 || count($injection)==0){
			

			return redirect('veterinaria')->with('status', 'Atención!!! Ingrese registros en Veterinaria');
		}	
		
		
			return view('animals.registro_sanitario_injection',compact('animals','disease','injection'));
	}

	public function ejecutar_injection(Request $requestI)
	{		
			$rules =array(

			
			'dateApplication'			=> 'required',
			'boosterInjection'			=> 'required',
			'dose'						=> 'required',	
			'responsible'				=> 'required',			

			);

			$this->validate($requestI,$rules);
			$idFarm=Session::get('key');
		
			$dateA=	Input::get('dateApplication');
			$dateApplication=date(microtime(substr($dateA, 6, 4)."-".substr($dateA, 3, 2)."-".substr($dateA, 0, 2)." " .substr($dateA, 10, 6)) * 10000);
			$boosterI=	Input::get('boosterInjection');
			$boosterInjection=date(microtime(substr($dateA, 6, 4)."-".substr($dateA, 3, 2)."-".substr($dateA, 0, 2)." " .substr($dateA, 10, 6)) * 10000);
			$price=Injection::where('id',$requestI->injectionName)->pluck('price_ml');

			
			$ic= new InjecctionControl();
			if($idFarm==null){			
				$ic->idFarm=1;
			}else
			{
				$ic->idFarm=$idFarm;	
			}
			$ic->idUser=Auth::id();
			$ic->animalName=$requestI->animalName;
		
			$ic->diseaseName=$requestI->diseaseName;
			$ic->injectionName=$requestI->injectionName;
			$ic->dateApplication=$requestI->dateApplication;
			
			$ic->dose= $requestI->dose;
			$ic->value=$requestI->dose*$price;
			$ic->responsible=$requestI->responsible;
			$ic->boosterInjection=$requestI->boosterInjection;	
			$ic->save();

			$event = new Calendar();
			if($idFarm==null){			
				$event->idFarm=1;
			}else
			{
				$event->idFarm=$idFarm;	
			}
			$event ->idUser=Auth::id();
			$event ->title ='Vacunacion';
			$event ->body = 'Programada'; 
			$event ->url = 'http://localhost:8000/vaccinationControl';
			$event ->class = 'Preventivo';
			$event ->start = $dateApplication;
			$event ->end = $boosterInjection;	

			$event->save();

			$animal= Animal::where('id',$requestI->animalName)->lists('nombre');
			$injection= Injection::where('id',$requestI->injectionName)->lists('name');
			$disease= Disease::where('id',$requestI->diseaseName)->lists('name');			
			$animal=array_pull($animal,0);
			$injection=array_pull($vaccine,0);
			$disease=array_pull($disease,0);

			$data = array(

        'name' => $animal,
        'injection'=>$injection,
        'disease'=>$disease,
        'boosterInjection'=>$requestI->boosterInjection,

    );
			
		

    Mail::send('emails.injection', $data, function ($message) {

    	$email=Auth::user();
		$correo= array_pull($email,'email');//dd($correo);

        $message->from('appgrocr@gmail.com', 'Evento de Inyectado');

        $message->to($correo)->cc('appgrocr@gmail.com')->subject('Notificaciones Appgro.com');


    });
		
			return redirect() -> route('animal.index');


	}


	public function control_alimenticio($id)
	{
			
			$animals= Animal::where('id',$id)->lists('nombre','id');
			$food_supplements= Food_Supplement::where('idUser',Auth::id())->lists('nameProduct','id'); 		
			
			return view('animals.control_alimenticio',compact('animals','food_supplements'));
	}

	public function ejecutar_alimento(Request $request)
	{	
			$rules =array(

			
				
			'dose'						=> 'required',	
			'responsible'				=> 'required',			

			);

			$this->validate($request,$rules);
			$idFarm=Session::get('key');

			$dateA=	Input::get('dateApplication');
			$dateApplication=date(microtime(substr($dateA, 6, 4)."-".substr($dateA, 3, 2)."-".substr($dateA, 0, 2)." " .substr($dateA, 10, 6)) * 10000);
			$boosterI=	Input::get('boosterInjection');
			$boosterInjection=date(microtime(substr($dateA, 6, 4)."-".substr($dateA, 3, 2)."-".substr($dateA, 0, 2)." " .substr($dateA, 10, 6)) * 10000);
			$price=Food_Supplement::where('id',$request->food_supplements)->pluck('price_kg');	 

			//$animalName=Animal::where('id',$request->animalName)->pluck('nombre');
			//$food_supplement=Food_Supplement::where('id',$request->food_supplements)->pluck('nameProduct');		

			$dc= new DietaryControl();
			if($idFarm==null){			
				$dc->idFarm=1;
			}else
			{
				$dc->idFarm=$idFarm;	
			}
			$dc->idUser=Auth::id();
			$dc->idAnimal=$request->animalName;			
			$dc->idFood_Supplemet=$request->food_supplements;
			$dc->dateApplication=$request->dateApplication;		
			$dc->Dosage=$request->dose;
			$dc->value=$request->dose*$price;
			$dc->responsible=$request->responsible;					
			$dc->save();


			$event = new Calendar();
			if($idFarm==null){			
				$event->idFarm=1;
			}else
			{
				$event->idFarm=$idFarm;	
			}
			$event ->idUser=Auth::id();
			$event ->title ='Alimentacion';
			$event ->body = 'Programada'; 
			$event ->url = 'http://localhost:8000/vaccinationControl';
			$event ->class = 'Preventivo';
			$event ->start = $dateApplication;
			$event ->end = $boosterInjection;
			

			$event->save();
				
			return redirect() -> route('animal.index');

	}

	public function peso($id){

			$animals= Animal::where('id',$id)
						->where('idUser',Auth::id())
						->lists('nombre','id');
			$animalName= Animal::where('id',$id)
						->where('idUser',Auth::id())
						->lists('nombre');  			
			$animalName=array_pull($animalName,0);
		
		

		

			return view('animals.peso',compact('animals','animalName'));


	}

	public function ejecutar_peso(Request $request){

			$rules =array(
			'price'				=> 'required|integer',
			'weight'				=> 'required|integer',
			'dateweight'			=> 'required',					

			);

			$this->validate($request,$rules);
			$idFarm=Session::get('key');


			$weight= new Weight();
			if($idFarm==null){			
				$weight->idFarm=1;
			}else
			{
				$weight->idFarm=$idFarm;	
			}

			$weight->idUser= Auth::id();
			$weight->idAnimal=$request->animalName;
			$weight->weight=$request->weight;
			$weight->value=$request->price*$request->weight;
			$weight->dateWeight=$request->dateweight;
			$weight->save();

			$event = new Calendar();
			if($idFarm==null){			
				$event->idFarm=1;
			}else
			{
				$event->idFarm=$idFarm;	
			}

			$event ->idUser=Auth::id();
			$event ->title ='Alimentacion';
			$event ->body = 'Programada'; 
			$event ->url = 'http://localhost:8000/vaccinationControl';
			$event ->class = 'Preventivo';
			$event ->start = $request->dateweight;
			$event ->end = $request->dateweight;
			

			$event->save();
			return redirect()->route('animal.index');


	}

	public function redirect_milk_production($idAnimal){

		$milk_production = Animal::findOrFail($idAnimal);

		$animals= Animal::where('id',$idAnimal)->lists('nombre','id');

		$carbon = new \Carbon\Carbon();
		$today = $carbon->now();
		$today = $today->format('m/d/Y');

		

			$milk_productions= MilkProduction::where('milk_productions.idUser',Auth::id())
									 ->where('milk_productions.idAnimal',$idAnimal)
						      	     ->join('animals','animals.id','=','milk_productions.idAnimal')						      	     
						      	     ->select('animals.nombre','milk_productions.date','milk_productions.morning_production','milk_productions.later_production')
						  			 ->get();//dd($milk_productions);

			foreach ($milk_productions as $milk_production) 
			{
				$date[] = $milk_production->date ;
				
			}
				//dd($milk_productions);

			//dd($date);
			if(empty($date))
			{
				$mp= new MilkProduction();
				$idFarm=Session::get('key');
			if($idFarm==null){			
				$mp->idFarm=1;
			}else
			{
				$mp->idFarm=$idFarm;	
			}


			$mp->idUser= Auth::id();
			$mp->idAnimal=$idAnimal;
			
			$mp->date=$today;
			$mp->save();

			}
			
		
		
			return view('animals.milk_production',compact('milk_productions','animals'));
						  			 

		
		


	}

	public function update_milk_production($id, Request $request){

			$mp = MilkProduction::findOrFail($id);
			

			$mp->later_production= $request->later_production;
			$mp->morning_production=$request->morning_production;
			$mp->total_production=$request->morning_production +$request->later_production;
			$mp->price_production=$request->morning_production +$request->later_production * $request->price;
			 
			$mp->save();
			

			return view('animals.milk_production');
		


	}
	public function milk_production($id){
			
			$animals= Animal::where('idUser',Auth::id())->get();

			return view('animals.milk_production',compact('animals'));
	}



	
	





	
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	
	

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$animal = Animal::findOrFail($id);
		//dd($vaccine);
		
		return view('animals.edit', compact('animal'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$animal = Animal::findOrFail($id);
		//Validaciones
		$rules =array(				
						'nombre'  					=> 'required',																					
						
					  );
		$this->validate($request,$rules);
		
		$animal->nombre= $request->nombre;			
		$animal->raza = $request->raza;		
		$animal->fechaMuerte= $request->fechaMuerte;					
		$animal->caracteristicas= $request->caracteristicas;
			//Validacion de imagen 
		if (Input::hasFile('image')) 
		{	
			$file = Input::file('image');//Creamos una instancia de la libreria instalada
			$image = \Image::make(\Input::file('image'));//Ruta donde queremos guardar las imagenes
			$path = 'img/animal/';			
			// Cambiar de tamaño
			$image -> resize(450, 450);
			$image -> save($path . $file -> getClientOriginalName());	
			$animal->image = $file -> getClientOriginalName();
		  	//$animal->save(); 
	      	//return redirect() -> route('animal.index');
	     }else
	     {
	     	//Si no hay imagen, se guarda una por defecto
	      	$image='animal';  
	      	$default = 'animal.jpg';
	      	$animal->image = $default;	        	
	      	//$animal->save();
	     }

	     $animal->save();
	     return redirect() -> route('animal.index');


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id = null)
	{
		
	}



}
