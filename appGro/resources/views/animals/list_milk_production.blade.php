@extends('app')

@section('content') 
    <div class="container">
     
        <div class="row">

            <div class="col-md-10 col-md-offset-1">


                <div class="panel panel-default">
                  
                    <div class="panel-heading">   
                                    
                    </div>
                   
                    <div class="panel-body">

                       <div id="table" class="table-editable">
                              <span class="table-add glyphicon glyphicon-plus"></span>
                              <table class="table">
                                <tr>
                                  <th>Nombre</th>
                                  <th>Producción Mañana</th>
                                  <th>Producion Tarde</th>                                  
                                </tr>
                                @foreach($milk_productions as $milk_production) 
                                <tr>
                                  <td contenteditable="true">{{$milk_production->nombre }}</td>
                                  <td contenteditable="true">{{$milk_production->morning_production }}</td>
                                  <td contenteditable="true">{{$milk_production->later_production }}</td>                             
                                  
                                </tr>
                                @endforeach 
                                
                              </table>
                            </div>

                            <button id="export-btn" class="btn btn-primary">Guardar</button>
                            <p id="export"></p>
                          </div>

                         <!--                    
                        <div class="table-responsive">   
                          <table class="table">
                            <thead>
                              <tr>
                                                             
                                <th>Nombre</th>
                                <th>Producion Mañana</th>
                                <th>Producion Tarde</th>
                                <th></th>
                               
                                               
                              </tr>
                            </thead>
                            <tbody> 
                             @foreach($milk_productions as $milk_production)        
                            <tr>              
                                                           
                                <td>{{$milk_production->nombre }}</td>               
                                <td >{{$milk_production->morning_production }}</td>           
                              s  <td>{{$milk_production->later_production }}</td >                               
                                <td><a class="btn mini blue-stripe" href="{{ url('animal/milk_production/ejecutar_milk_production', $milk_production->id) }}" >Generar</a></td>
                              
                            </tr> 
                               @endforeach                
                            </tbody>
                          </table>
                          </div>
                          -->
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection