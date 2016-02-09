@extends('app')
 
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
			<div class="panel-heading">Nuevo Proveedor</div>
			 @if($errors->any())
                <p>Corregir los siguientes Errores</p>
                    <div class='alert alert-danger'>
                        @foreach ($errors->all('<p>:message</p>') as $message)
                            {!! $message !!}
                        @endforeach
                    </div>
                @endif
 
				@if (Session::has('message'))
				    <div class="alert alert-success">{{ Session::get('message') }}</div>
				@endif

			
				<div class="panel-body">

						{!! Form::open(['action'=>'ProviderController@store']) !!}
						
							<div  id="name" class="form-group">
								{!!Form::label('name', 'Nombre')!!}
								{!!Form::text('name',null,["class" => "form-control"])!!}
							</div>

							<div  id="address" class="form-group">
								{!!Form::label('address', 'Dirección')!!}
								{!!Form::text('address',null,["class" => "form-control"])!!}
							</div>
							<div  id="email" class="form-group">
								{!!Form::label('email', 'Correo')!!}
								{!!Form::text('email',null,["class" => "form-control"])!!}
							</div>
							<div  id="phone" class="form-group">
								{!!Form::label('phone', 'Telefono')!!}
								{!!Form::text('phone',null,["class" => "form-control"])!!}
							</div>
							<div  id="service" class="form-group">
								{!!Form::label('service', 'Servicio')!!}
								{!!Form::text('service',null,["class" => "form-control"])!!}
							</div>
							<div  id="observation" class="form-group">
								{!!Form::label('observation', 'Observaciones')!!}
								{!!Form::text('observation',null,["class" => "form-control"])!!}
							</div>

							
							<div class="form-group">
								{!! Form::submit('Guardar Proveedor', ["class" => "btn btn-success btn-block"]) !!}
							</div>
					 {!! Form::close() !!}
				
 
			
 							

 
				
				</div>
				

	
			</div>
		</div>
	</div>
</div>
@endsection