@extends('app')


@section('content')

<div id="pdf" class="container">

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
              
            <div class="panel panel-default">
         <script type="text/javascript">
         

          function genPDF() {

            var doc = new jsPDF();
            doc.fromHTML($('#pdf').get(0),20,20,{
                  'width':500 });
            doc.save('report.pdf');
                         

              
          }

    
          </script>
          <script type="text/javascript" src="../js/jspdf.min.js"></script>




                <div class="panel-heading">
                <!-- <button onclick="genPDF()">Generar Reporte</button> -->
                </div>
                <div id="pdf">
                <div class="panel-body">

                    <div class="row">
                      <div align="center">
                        <div class="table-responsive">
                         <div>
                        <h3>Datos Animal</h3>
                        @foreach($animals as $animal)  
                         <div  class="col-sm-6 col-md-4" >
                                <div align="center" class="thumbnail">
                                  <img src="/img/animal/{{$animal->image}}" alt="{{$animal->nombre}}">
                                   <h3>{{$animal->nombre}}</h3>                            
                                </div>
                            </div>
                            @endforeach 
                        </div>                                               
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
                           <div align="center"><h5>Total Consumido  de Vacunas:¢ {{$totalVaccine}} </h5></div>
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
                          <div align="center"><h5>Total Consumido de Inyecciones:¢ {{$totalInjecction}} </h5></div>
                          </div>
                      </div> 

                    </div>
                </div>
                </div>
        </div>
    </div>
</div>
@endsection

