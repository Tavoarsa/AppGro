<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App;

use App\Animal;
use App\VaccinationControl;
use App\InjecctionControl;
use App\Weight;
use Auth;
use Session;
use App\DietaryControl;
use Barryvdh\DomPDF\Facade as PDF;

class ReportController extends Controller {

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

		
		return view('reports.index',compact('animals'));
	
	}
	

	
	public function create_veterinario(Request $request)
	{
		$animals= Animal::where('idUser',Auth::id())
						->where('id',$request->id)
						->get();
		/*$peso=Weight::where('idUser',Auth::id())
					 ->where('idAnimal',$request->id)
					 ->get();dd($peso);*/
		$vaccines= VaccinationControl::where('vaccination_controls.idUser',Auth::id())
									 ->where('vaccination_controls.animalName',$request->id)
									 ->leftJoin('vaccines', 'vaccines.id', '=', 'vaccination_controls.vaccineName')
									 ->leftJoin('diseases', 'diseases.id', '=', 'vaccination_controls.diseaseName')						      	     						      	     
						      	     ->select('vaccines.nameV','diseases.name','vaccination_controls.dateApplication','vaccination_controls.dose','vaccination_controls.value')
						      	     ->get();
		if(count($vaccines)==0){
			$totalVaccine=0;

		}else{
			foreach ($vaccines as $vaccine) {

			$valueVaccine[] = $vaccine->value;
			
		
		}
		$totalVaccine=array_sum($valueVaccine);
		}		      	     
		
		
	

		$injecctions= InjecctionControl::where('injecction_controls.idUser',Auth::id())
									 ->where('injecction_controls.animalName',$request->id)
						      	     ->leftJoin('injections','injections.id','=','injecction_controls.injectionName')
						      	     ->leftJoin('diseases','diseases.id','=','injecction_controls.diseaseName')
						      	     ->select('injections.name','diseases.name','injecction_controls.dateApplication','injecction_controls.dose','injecction_controls.value')
						  			 ->get();


			if(count($injecctions)==0){

				$totalInjecction=0;


			}else{
				foreach ($injecctions as $injecction) {

			$valueInjecction[] = $injecction->value;
			
		
		}
		$totalInjecction=array_sum($valueInjecction);

		}

			

        $animal= Animal::where('id',$request->id)->get();
		
        return  view('reports.veterinario',compact('animals','vaccines','injecctions','animal','totalInjecction','totalVaccine'));
		
	}
	
	public function create_alimento(Request $request){

		 $animals= Animal::where('id',$request->id)->get();

		$dietary_controls= DietaryControl::where('dietary_controls.idUser',Auth::id())
									 ->where('dietary_controls.idAnimal',$request->id)
									 ->Join('food__supplements', 'food__supplements.id', '=', 'dietary_controls.idFood_Supplemet')									 
						      	     ->select('food__supplements.nameProduct','dietary_controls.Dosage','dietary_controls.value','dietary_controls.dateApplication')
						      	     ->get();//dd($dietary_controls);

		if(count($dietary_controls)==0){

			$totalDietary_control=0;


		}else{
			foreach ($dietary_controls as $dietary_control) {

			

			$dietary_cont[] = $dietary_control->value;
			$dateApplication[]=$dietary_control->dateApplication;
			
		
		}
		$totalDietary_control=array_sum($dietary_cont);
		$date=$dateApplication;//dd($date);

		}		
		

		return  view('reports.alimento',compact('animals','dietary_controls','totalDietary_control','dateApplication'));
		
	}
	/*
	public function pdf_reporte(){

		/*$pdf = App::make('dompdf.wrapper');	
		foreach ($animals as $animal) {
			//dd($animal->nombre);
			$pdf->loadHTML('<div>'.$animal->nombre.'</div>'

					 .'<div class="panel-body">'

                    .'<div class="row">'
                      .'<div>'
                       .'<div class="table-responsive">'
                         .'<div >'
                        .'<h3>Datos Animal</h3>'
                        .@foreach($animals as $animal)  
                         .'<div class="col-sm-6 col-md-4" >'
                                .'<div class="thumbnail">'
                                  <img src="/img/animal/{{$animal->image}}" alt="{{$animal->nombre}}">
                                   <h3>{{$animal->nombre}}</h3>                            
                                </div>
                            </div>
                            @endforeach 
                        </div> 
                                              
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Numero</th>                               
                                <th>Nombre</th>
                                <th>Genero</th>
                                <th>Raza</th>                                
                                <th>Fecha Nacimiento</th>                                              
                              </tr>
                            </thead>
                            <tbody> 
                             @foreach($animals as $animal)        
                            <tr>              
                                <td>{{$animal->numeroAnimal }}</td>                             
                                <td>{{$animal->nombre }}</td>               
                                <td>{{$animal->genero }}</td>           
                                <td>{{$animal->raza }}</td>                                
                                <td>{{$animal->fechaNacimiento }}</td>
                                
                            </tr> 
                               @endforeach                
                            </tbody>
                          </table>
                          </div>  
                      </div>
                      <div>
                          <div class="table-responsive"> 
                          <h3>Vacunas Aplicadas</h3>                   
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Nombre</th>                               
                                <th>Enfermedad</th>
                                <th>Dosis</th>
                                <th>Fecha Aplicada</th>
                                
                                               
                              </tr>
                            </thead>
                            <tbody> 
                             @foreach($vaccines as $vaccine)        
                            <tr>              
                                <td>{{$vaccine->nameV}}</td>                             
                                <td>{{$vaccine->name}}</td>               
                                <td>{{$vaccine->dose }}ml</td>           
                                <td>{{$vaccine->dateApplication }}</td>
                                
                            </tr> 
                               @endforeach                
                            </tbody>
                          </table>
                          </div>
                      </div>
                       <div>
                          <div class="table-responsive">
                          <h3>Injecciones Aplicadas</h3>          
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Nombre</th>                               
                                <th>Enfermedad</th>
                                <th>Dosis</th>
                                <th>Fecha Aplicada</th>
                                
                                               
                              </tr>
                            </thead>
                            <tbody> 
                             @foreach($injecctions as $injecction)        
                            <tr>              
                                <td>{{$injecction->name}}</td>                             
                                <td>{{$injecction->name}}</td>               
                                <td>{{$injecction->dose }}ml</td>           
                                <td>{{$injecction->dateApplication }}</td>
                                
                            </tr> 
                               @endforeach                
                            </tbody>
                          </table>
                          </div>
                      </div>

                    </div>
                </div>
						<div>Hola</div>
						 <div class="row">
                            
                        </div>'

						
				);
		}
		
		$path = 'img/animal/';	
		
		
						
				
		return $pdf->stream()->save($path);


	}


*/
		
	

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
