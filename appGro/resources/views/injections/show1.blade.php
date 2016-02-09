@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">              
            <div class="panel panel-default">
             <div class="panel-heading"> 
                <a href="{{ url('/injection') }}" class="btn btn-info" role="button">Listado de Inyecciones</a>
             </div>
                <div class="panel-body">
                    <div class="row">
                        @foreach($injections as $injection)
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="/img/injections/{{$injection->image}}" alt="{{$injection->name}}">
                                <div class="caption">
                                    <a class="btn  btn-info" href="{{url('injections/edit', $injection->id) }}">Editar</a>                     
                                 </div>                                   
                            </div>
                        </div>
                            <div class="col-sm-6 col-md-8">
                               <h1 >{{$injection->name}}</h1>
                               <h5>Se debe inyectar:</h5>
                               <p>{{$injection->indications}}</p>
                               <h5>Se debe tomar en cuenta las siguientes precauciones</h5>
                               <p>{{$injection->precautions}}</p>
                               <h5>La dosis recomendada es la siguiente:</h5>
                               <p>{{$injection->Dosage}}</p>
                               <h5>Posibles efectos que puede causar</h5>
                               <p>{{$injection->effects}}</p>
                            </div>
                        @endforeach                           
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

