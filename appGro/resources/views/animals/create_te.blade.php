@extends('app')
 
@section('content')
<div class="container">
	<div class="row">
		
			<div class="panel panel-default">
				<div class="panel-heading">Ingresar Nuevo Animal- Trasferencia de Embriones</div>
 
                @include('partials.messages')

			
 
				<div class="panel-body">
					{!! Form::open(['route' => 'animal.store','class' =>'form','novalidate' =>'novalidate','files' => true]) !!}
 							<div hidden class="form-group">
       						  {!!Form::text('te',"te") !!}
       						 	
       						 </div>

							<div class="form-group">
								{!!Form::label('nombre', 'Nombre Animal')!!}
								{!!Form::text('nombre', null, ["class" => "form-control"]) !!}
							</div>

							<div  id="padre" class="form-group">
								{!!Form::label('padre', 'Padre')!!}
								{!!Form::text('padre', null, ["class" => "form-control"]) !!}
							</div>

							
							<div  id="madre_donadora" class="form-group">
								{!!Form::label('madre_donadora', 'Madre Donadora')!!}
								{!!Form::text('madre_donadora', null, ["class" => "form-control"]) !!}
							</div>

							<div  id="madre_receptora" class="form-group">
								{!!Form::label('madre_receptora', 'Madre Receptora')!!}
								{!!Form::text('madre_receptora', null, ["class" => "form-control"]) !!}
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


     <script type="text/javascript">

           
                $('#fechaNacimiento').datetimepicker({
                     });

        </script>

@endsection