@extends('app')
 
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Control de Peso Para el animal:{{$animalName}}</div>
 
               @include('partials.messages')			
 
				<div class="panel-body">

					{!! Form::open(array('url'=>'animal/peso/ejecutar_peso','novalidate' =>'novalidate','method'=>'POST', 'files'=>true)) !!}              
                            
                             <div class="form-group">
                                {!!Form::label('price', 'Precio x kilo')!!}
                                {!!Form::text('price',null,["class" => "form-control"])!!}
                                
                            </div>
                             <div  hidden class="form-group">
                                {!!Form::label('animalName', 'Animal')!!}
                                {!!Form::select('animalName',$animals,["class" => "form-control"])!!}
                            </div>                           

                            <div class="form-group">
                                {!!Form::label('weight', 'Peso')!!}
                                {!!Form::text('weight',null,["class" => "form-control"])!!}
                                
                            </div>
                                 <div class="form-group">
                            <label for="dateweight">Fecha de Peso</label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" name="dateweight">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
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