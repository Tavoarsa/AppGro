@extends('app')

@section('content')
 
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"> 
                    </div> 
                                  
                    <div class="panel-body">
                        <div class="table-responsive">          
					  <table class="table">
					    <thead>
					      <tr>
					        <th>Nombre</th>
					        <th>Direccion</th>
					        <th>Correo</th>
					        <th>Telefono</th>
					        <th>Servico que ofrece</th>
					        <th>Observaciones</th>					       
					      </tr>
					    </thead>
					    <tbody>	
					     @foreach($providers as $provider) 				
					    <tr>				     	
					        <td>{{$provider->name }}</td> 			          
					        <td>{{$provider->address }}</td>
					        <td>{{$provider->email }}</td>					     
					        <td>{{$provider->phone }}</td>			     
				            <td>{{$provider->service }}</td>				            		         
   					        <td>{{$provider->observation }}</td>
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