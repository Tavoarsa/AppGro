@extends('app')

@section('content')
 
    <div class="container">
      

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">  
                    <a  class="btn btn-info" role="button" data-toggle="modal" data-target="#myModal">Nuevo Animal</a>
                     <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-sm">
                <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Modal Header</h4>
                                        </div>
                                        <div class="modal-body">
                                           
                                <button class="btn btn-default active" title="Fertilización In Vitro">FVI</button>
                                <button class="btn btn-default active"title="Inseminación Artificial">IA</button>
                                <button class="btn btn-default active" title="Monta Natural">MN</button>
                                <button class="btn btn-default active">TE</button>
                                <button class="btn btn-default active" title="Sin Registro">SR</button>
                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>                
                    <div class="panel-body">
                        <div class="row">
                            @foreach($animals as $animal)

                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                <h3>{{$animal->nombre}}</h3>
                                      
                                       <a  href="{{url('animal/control_animal',$animal->id) }}">
                                            <img src="/img/animal/{{$animal->image}}" alt="{{$animal->nombre}}">
                                        </a> 
                                 
                                    <div class="caption">
                                    
                                        

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
 