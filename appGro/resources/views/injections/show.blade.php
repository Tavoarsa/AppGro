@extends('app')

@section('content')
<div class="container">

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
              
            <div class="panel panel-default">


                <div class="panel-heading">
               <a href="{{ url('/injection') }}" class="btn btn-info" role="button">Listado de Inyecciones</a>
       
                     {!!Form::open(['route'=>'injection.show','method'=>'GET', 'class'=>'navbar-form navbar-left pull-right', 'role'=>'search'])!!}
                         <div class="form-group">

                            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de Inyección'])!!}
                                                    
                         </div>
                          <button class= "btn btn-info" type="submit">Buscar</button> 
                           {!!Form::close()!!}
                </div>


                <div class="panel-body">

                        <div class="row">
                            @foreach($injections as $injection)
                            @if($injection->name=="Error 404")
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                  <a >
                                      <img src="/img/injections/{{$injection->image}}" alt="{{$injection->name}}">
                                  </a>
                                    
                                </div>
                            </div>
                           

                         
                            @endif

                            
                           
                            @endforeach                           
                        </div>
                    </div>
        </div>
    </div>
</div>
@endsection

