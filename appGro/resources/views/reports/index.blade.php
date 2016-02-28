@extends('app')

@section('content') 
    <div class="container">
     
        <div class="row">

            <div class="col-md-10 col-md-offset-1">


                <div class="panel panel-default">
                  
                    <div class="panel-heading">
                      <div>Reporte de Animales</div>   
                                    
                    </div>
                   
                    <div class="panel-body">
                      <div class="row">
                       {!!Form::open(['route'=>'report.show','method'=>'GET', 'class'=>'navbar-form navbar-left pull-right', 'role'=>'search'])!!}

                         <div class="form-group">
                            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre Animal'])!!}                                                    
                         </div>
                          <button class= "btn btn-info" type="submit">Buscar</button> 
                        {!!Form::close()!!}            


                      </div>
                       
                        <div class="table-responsive">   
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Numero</th>                     
                               
                                               
                              </tr>
                            </thead>
                            <tbody> 
                             @foreach($animals as $animal)        
                            <tr>              
                                <td>{{$animal->numeroAnimal }}</td>                             
                                <td> <a class="btn btn-warning btn-xs btn-detail" href="{{ url('report/veterinario', $animal->id) }}">Veterinario</a></td>               
                                <td> <a class="btn btn-warning btn-xs btn-detail" href="{{ url('report/alimento', $animal->id) }}">Alimento</a></td>                     
                                <td> <a class="btn btn-warning btn-xs btn-detail" href="{{ url('report/procedencia', $animal->id) }}">Procendencia</a></td>               
                              
                            </tr> 
                               @endforeach               
                            </tbody>
                          </table>
                          </div>
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection