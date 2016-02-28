@extends('app')
 
@section('content')
<div class="container">
	<div class="row">
		
			<div class="panel panel-default">
				<div class="panel-heading">Ingresar Nuevo Animal - Inseminación Artificial</div>
 
                @include('partials.messages')

			
 
				<div class="panel-body">
					{!! Form::open(['route' => 'animal.store','class' =>'form','novalidate' =>'novalidate','files' => true]) !!}
 							
							<div hidden class="form-group">
       						  {!!Form::text('ia',"ia") !!}
       						 	
       						 </div>
							<div class="form-group">
								{!!Form::label('nombre', 'Nombre Animal')!!}
								{!!Form::text('nombre', null, ["class" => "form-control"]) !!}
							</div>
							
							<div  id="madre" class="form-group">
								{!!Form::label('madre', 'Madre')!!}
								{!!Form::text('madre', null, ["class" => "form-control"]) !!}
							</div>

							<div  id="padre" class="form-group">
								{!!Form::label('padre', 'Padre')!!}
								{!!Form::text('padre', null, ["class" => "form-control"]) !!}
							</div>

							<div class="form-group">
								{!!Form::label('raza', 'Raza')!!}
								{!! Form::select('raza', array('holsten' => 'Holsten', 'yersey' => 'Yersey','guir' => 'Guir'), 'Holtein',["class" => "form-control"])!!}
							</div>

							<div class="form-group">
								{!!Form::label('genero', 'Genero')!!}
								{!! Form::select('genero', array('hembra' => 'Hembra', 'macho' => 'Macho'), 'Hembra',["class" => "form-control"])!!}
							</div>
							
							  <div class="form-group">
                            <label for="fechaNacimiento">Fecha Nacimiento</label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" name="fechaNacimiento">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>							

							<div class="form-group">
								{!!Form::label('caracteristicas', 'Caracteristicas')!!}
								{!! Form::text('caracteristicas', null, array("class" => "form-control", 'placeholder' => 'Observaciones')) !!}
							</div>

							<div class="controls">
								{!!Form::label('image', 'Foto')!!}
         						
         						<input type="file" name="image" required> 
         													
       						 </div>
 
							
							<div class="form-group">
								{!! Form::submit('Guardar', ["class" => "btn btn-success btn-block"]) !!}
							</div>
 
					{!! Form::close() !!}
				</div>					
			</div>
		
	</div>
</div>

  <script>
    $('.datepicker').datepicker({
        format: "yyyy/mm/dd",
        language: "es",
        autoclose: true
    });
</script>

@endsection