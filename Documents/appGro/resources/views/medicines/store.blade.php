@extends('app')
 
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>
			<h1>Hola</h1>
				<div class="panel-body">

						{!! Form::open(['action'=>'ProfitabilityController@storeMedicine','class' =>'form','novalidate' =>'novalidate']) !!}
						
							<div  class="form-group">
								{!!Form::label('providerName', 'Proveedor')!!}
								{!!Form::select('providerName',$providers,$selected,["class" => "form-control"])!!}
							</div>

							<div  id="address" class="form-group">
								{!!Form::label('nameProduct', 'Producto')!!}
								{!!Form::text('nameProduct',null,["class" => "form-control"])!!}
							</div>
							<div  id="email" class="form-group">
								{!!Form::label('size', 'Cantidad')!!}
								{!!Form::text('size',null,["class" => "form-control"])!!}
							</div>
							<div  id="phone" class="form-group">
								{!!Form::label('price', 'Precio')!!}
								{!!Form::text('price',null,["class" => "form-control"])!!}
							</div>
							<div class="form-group">
								{!!Form::label('due_date', 'Fecha Vencimiento')!!}
								{!! Form::input('date', 'due_date') !!}
							</div>
							

							
							<div class="form-group">
								{!! Form::submit('Guardar Medicamento', ["class" => "btn btn-success btn-block"]) !!}
							</div>
					 {!! Form::close() !!}
				
 
			
 							

 
				
				</div>
				

	
			</div>
		</div>
	</div>
</div>
@endsection