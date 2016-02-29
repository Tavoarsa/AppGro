@extends('app')

@section('content') 
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">    
            {!!Form::open(['route'=>'provider.show','method'=>'GET', 'class'=>'navbar-form navbar-left pull-left', 'role'=>'search'])!!}
            <div class="form-group">
             {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre Proveedor'])!!}                                     
            </div>
             <button class= "btn btn-info" type="submit">Buscar</button> 
             {!!Form::close()!!}
              <a href="{{ url('/provider/create') }}" class="btn btn-info" role="button">Nuevo Proveedor </a>
          </div>
                   
          <div class="panel-body">
                      <div class="table-responsive">          
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Nombre</th>                         
                                <th>Servico</th>
                                <th></th>
                                               
                              </tr>
                            </thead>
                            <tbody> 
                             @foreach($providers as $provider)        
                            <tr>              
                                <td>{{$provider->name }}</td>                                
                                <td>{{$provider->service }}</td>
                                <td><a class="btn btn-info" href="{{ url('provider/edit', $provider->id) }}" >Editar</a></td>                                 
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