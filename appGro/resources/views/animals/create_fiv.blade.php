@extends('app')
 
@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Ingresar Nuevo Animal</div>
 
                @include('partials.messages')
               
			
 
				<div class="panel-body">
					{!! Form::open(['route' => 'animal.store','class' =>'form','novalidate' =>'novalidate','files' => true]) !!}
 							

							<div class="form-group">
								{!!Form::label('nombre', 'Nombre Animal')!!}
								{!!Form::text('nombre', null, ["class" => "form-control"]) !!}
							</div>
							
							<div  class="form-group">
								{!!Form::label('madre_d', 'Madre Donadora')!!}
								{!!Form::text('madre_d',null,["class" => "form-control"])!!}
							</div>

							<div class="form-group">
								{!!Form::label('madre_r', 'Madre Receptora')!!}
								{!!Form::text('madre_r',null,["class" => "form-control"])!!}
								
							</div>
						



							<div class="form-group">
								{!!Form::label('raza', 'Raza')!!}
								{!! Form::select('raza', array('holsten' => 'Holsten', 'yersey' => 'Yersey','guir' => 'Guir'), 'Holtein',["class" => "form-control"])!!}
							</div>

							<div class="form-group">
								{!!Form::label('genero', 'Genero')!!}
								{!! Form::select('genero', array('hembra' => 'Hembra', 'macho' => 'Macho'), 'Hembra',["class" => "form-control"])!!}
							</div>
							
							 {!!Form::label('fechaNacimiento', 'Fecha Nacimiento')!!}
							 <div class='input-group date' id='fechaNacimiento'>

                       			 {!! Form::input('text', 'fechaNacimiento',null,['class'=>'form-control']) !!}
                       			<!-- <input type='date' name= 'to' class='form-control' readonly>-->
                        
                        		<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                   			 </div>		

							<div class="form-group">
								{!!Form::label('pesoNacimiento', 'Peso Nacimiento')!!}
								{!! Form::text('pesoNacimiento', null,array("class" => "form-control", 'placeholder' => 'Peso en Kilogramos')) !!}
							</div>

							

							<div class="form-group">
								{!!Form::label('observaciones', 'Observaciones')!!}
								{!! Form::text('observaciones', null, array("class" => "form-control", 'placeholder' => 'Observaciones')) !!}
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
</div>


     <script type="text/javascript">

           
                $('#fechaNacimiento').datetimepicker({
                     });

        </script>

@endsection