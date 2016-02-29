@extends('app')

@section('content')
<div class="container">

    <div class="row">

        <div class="col-md-10 col-md-offset-1">
              
            <div class="panel panel-default">
            <div class="panel-heading">Listado de Fincas
            <div align="right">
                    <a href="{{ url('/portal/') }}" class="button"><span class="glyphicon glyphicon-circle-arrow-left"></span></a>
                     
                    </div>

            </div>
                
               
                <div class="panel-body">

                        <div class="row">
                            @foreach($farms as $farm)

                            <div class="col-sm-6 col-md-4">
                            <div align="center" class="caption">
                                <h3 >{{$farm->name}}</h3>
                            </div>
                            <div class="thumbnail">
                            <img src="/img/patent/{{$farm->patent}}" alt="{{$farm->name}}">                     
                            </div>
                            <p align="center"><a class="btn btn-small btn-info" href="{{url('farm/edit', $farm->id) }}">Editar</a> </p>                              
                            </div>
                            @endforeach                           
                        </div>
                    </div>
        </div>
    </div>
</div>
@endsection

