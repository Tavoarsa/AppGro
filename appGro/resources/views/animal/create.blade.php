@extends('app')
 
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>
 
                @if($errors->has())
                    <div class='alert alert-danger'>
                        @foreach ($errors->all('<p>:message</p>') as $message)
                            {!! $message !!}
                        @endforeach
                    </div>
                @endif
 
				@if (Session::has('message'))
				    <div class="alert alert-success">{{ Session::get('message') }}</div>
				@endif

				<script>

				function readURL(input) { 


					if (input.files && input.files[0]) { 

						var reader = new FileReader(); 
						reader.onload = function (e) { 
							$('#blah').attr('src', e.target.result);
							 } 

							 reader.readAsDataURL(input.files[0]); 
							}
						} 
						$("#image").change(function(){ readURL(this); });




				</script>
 
				<div class="panel-body">
					{!! Form::open(['route' => 'animal.store','class' =>'form','novalidate' =>'novalidate','files' => true]) !!}
 							<div class="form-group">
								{!!Form::label('numeroAnimal', 'Numero Animal')!!}
								{!! Form::text('numeroAnimal', null, ["class" => "form-control"]) !!}
							</div>

							<div class="form-group">
								{!!Form::label('nombre', 'Nombre Animal')!!}
								{!! Form::text('nombre', null, ["class" => "form-control"]) !!}
							</div>

							<div  id="padre" class="form-group">
								{!!Form::label('idPadre', 'Padre')!!}
								{!! Form::text('idPadre', null, ["class" => "form-control"]) !!}
							</div>

							<div class="form-group">
								{!!Form::label('idMadre', 'Madre')!!}
								{!! Form::text('idMadre', null, ["class" => "form-control"]) !!}
							</div>

							<div class="form-group">
								{!!Form::label('raza', 'Raza')!!}
								{!! Form::select('raza', array('holsten' => 'Holsten', 'yersey' => 'Yersey','guir' => 'Guir'), 'Holtein')!!}
							</div>

							<div class="form-group">
								{!!Form::label('genero', 'Genero')!!}
								{!! Form::select('genero', array('hembra' => 'Hembra', 'macho' => 'Macho'), 'Hembra')!!}
							</div>
								{!!Form::label('fechaNacimiento', 'Fecha de Nacimiento')!!}
								{!! Form::input('date', 'fechaNacimiento') !!}

								
								
							</div>

							<div class="form-group">
								{!!Form::label('pesoNacimiento', 'Peso Nacimiento')!!}
								{!! Form::text('pesoNacimiento', null,["class" => "form-control"]) !!}
							</div>

							<div class="form-group">
								{!!Form::label('fechaMuerte', 'Fecha Muerte')!!}
								{!! Form::input('date', 'fechaMuerte') !!}
							</div>

							<div class="form-group">
								{!!Form::label('observaciones', 'Observaciones')!!}
								{!! Form::text('observaciones', null, ["class" => "form-control"]) !!}
							</div>

							<div class="controls">
								{!!Form::label('foto', 'Foto')!!}
         						
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
@endsection