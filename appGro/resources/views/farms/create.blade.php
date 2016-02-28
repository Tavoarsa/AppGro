@extends('app')
 
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Registrar Nueva Finca</div>
 
                @if($errors->any())
                <p>Corregir los siguientes errores</p>
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



					{!! Form::open(['route' => 'farm.store','class' =>'form','novalidate' =>'novalidate','files' => true]) !!}
 
							<div class="form-group">

								{!!Form::label('name', 'Nombre')!!}
								{!! Form::text('name', null, ["class" => "form-control"]) !!}
							</div>

							<div class="form-group">

								{!!Form::label('address', 'Dirección')!!}
								{!! Form::text('address', null, ["class" => "form-control"]) !!}
							</div>


							<div class="form-group">

								{!!Form::label('agent', 'Representante')!!}
								{!! Form::text('agent', null, ["class" => "form-control"]) !!}
							</div>

							<div class="form-group">

								{!!Form::label('operationCertificate', 'Certificado Operacion')!!}
								{!! Form::text('operationCertificate', null, array("class" => "form-control", 'placeholder' => 'Numero generado por SENASA')) !!}
							</div>

							<div class="form-group">

								{!!Form::label('exploitation', 'Explotacion')!!}
								{!! Form::select('exploitation', array('carne' => 'Carne', 'leche' => 'Leche','doblePrposito' => 'Doble Proposito'), 'Leche')!!}
							</div>

							
							<div class="controls">
								{!!Form::label('patent', 'Fierro')!!}
         						 <input type="file" name="patent" required>   							
       						 </div>
 
							
							<div class="form-group">
								{!! Form::submit('Send', ["class" => "btn btn-success btn-block"]) !!}
							</div>
							 
 
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection