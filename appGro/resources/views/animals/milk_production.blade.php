@extends('app')

@section('content')

 <div class="panel-body">

 
                      <div class="table-responsive">          
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Fecha</th>                         
                                <th>Mañana</th>
                                <th>Tarde</th>
                                               
                              </tr>
                            </thead>
                            <tbody> 
                             @foreach($milk_productions as $milk_production)        
                            <tr>              
                                <td>{{$milk_production->date}}</td>                               
                                <td>{{$milk_production->morning_production }}</td>
                                <td>{{$milk_production->later_production}}</td>  
                                
                            </tr> 
                               @endforeach                
                            </tbody>
                          </table>
                          </div>
</div>

   

                           
                   
@endsection