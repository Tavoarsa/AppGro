@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">                       
          {!!Form::open(['route'=>'injection.show','method'=>'GET', 'class'=>'navbar-form navbar-left pull-left', 'role'=>'search'])!!}
          <div class="form-group">
           {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de Inyección'])!!}
         <button class= "btn btn-info" type="submit">Buscar Inyección</button> 
          {!!Form::close()!!}                                                    
          </div>
           <a href="{{ url('/injection/create') }}" class="btn btn-info" role="button">Nueva Inyección</a>    
        </div>
        <div class="panel-body">
          <div class="row">
            @foreach($injections as $injection)
              @if($injection->name==="no_found")
                <div class="col-sm-6 col-md-4">
                  <div class="thumbnail">
                    <a ><img src="/img/injections/{{$injection->image}}" alt="{{$injection->name}}"></a>
                  </div>
                </div>     
              @else
                <div class="col-sm-6 col-md-4">
                   <div class="thumbnail">
                      <img src="/img/injections/{{$injection->image}}" alt="{{$injection->name}}">
                        <div class="caption">
                          <h3 >{{$injection->name}}</h3>
                          <h3>{{$injection->descrition}}</h3>
                          <p><a class="btn btn-small btn-info" href="{{url('injections/edit', $injection->id) }}">Editar</a> </p>
                          </div>
                    </div>
                </div>
                @endif                  
           @endforeach                           
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

