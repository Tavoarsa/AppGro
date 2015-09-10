@extends('app')
@section('content') 


 <div class= 'container'>

    <button class= "btn btn-info" data-toggle="modal" data-target="#nuevo" >Nuevo Vacuna</button>
    <div class="modal fade" id="nuevo" tabindex= "-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

             <div class="modal-header">
                <button type="button" class="close" data-dismiis="modal" aria-hidden="true">&times;</button>
                <h4>Nuevo Vacuna</h4>

             </div>
             <div class="modal-body">
                <form action="{{route('addvaccine', [])}}" method="post" enctype="multipart/form-data">
                 <input name="_token" hidden value="{!! csrf_token() !!}" />

                 <div class="form-group">
                    {!!Form::label('name', 'Nombre')!!}
                    {!! Form::text('name', null,["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    {!!Form::label('description', 'Descripción')!!}
                    {!! Form::text('description', null,["class" => "form-control"]) !!}
                </div>
                <div class="controls">
                    {!!Form::label('filefield', 'Foto')!!}              
                    <input type="file" name="filefield" required> 
                                                            
                </div>
                <div class="form-group">
                    {!! Form::submit('Guardar', ["class" => "btn btn-success btn-block"]) !!}
                 </div>

                        
    </form>



             </div>

        </div>



    </div>
    
 </div>

</div>


 <h1> Vacunas</h1>
 <div class="row">
        <ul class="thumbnails">
 @foreach($vaccines as $vaccine)
            <div class="col-md-2">
                <div  class="thumbnail">
                    <img src="{{route('getvaccine', $vaccine->filename)}}" alt="ALT NAME" class="img-responsive" />
                    <div class="caption">
                        <p>{{$vaccine->name}}</p>
                    </div>
                </div>
            </div>
 @endforeach
 </ul>
 </div>
 
@endsection