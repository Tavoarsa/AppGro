@extends('app')

@section('content')
 
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">  
                    <a href="{{ url('/farm/create') }}" class="btn btn-info" role="button">Nueva Finca</a>
                    <div align="right">
                    <a href="{{ url('/portal/') }}" class="button"><span class="glyphicon glyphicon-circle-arrow-left"></span></a>
                     
                    </div>                  
                    <div class="panel-body">
                        <div class="row">
                            @foreach($farms as $farm)
                                <div class="col-sm-6 col-md-4">
                                   <div class="thumbnail">                                      
                                      <a href="{{ url('/portal',$farm->id) }}">
                                        <img src="/img/patent/{{$farm->patent}}" alt="{{$farm->name}}">
                                      </a>                                
                                    <div class="caption">                                        
                                       <h3 >{{$farm->name}}</h3>
                                    </div>
                                    </div>
                            </div>
                            @endforeach                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection