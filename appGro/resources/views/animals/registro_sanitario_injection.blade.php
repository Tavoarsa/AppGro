@extends('app')
 
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Aplicar Injecciones</div>
 
              @include('partials.messages')	

				 <div class="panel-body">				 

				 {!! Form::open(array('url'=>'animal/registro_sanitario/ejecutar_injection','method'=>'POST', 'files'=>true)) !!}				
				 
				 			<div  class="form-group">
								{!!Form::label('animalName', 'Animal')!!}
								{!!Form::select('animalName',$animals,["class" => "form-control"])!!}
							</div>

							

							<div class="form-group">
								{!!Form::label('diseaseName', 'Enfermedad')!!}
								{!!Form::select('diseaseName',$disease,["class" => "form-control"])!!}
								
							</div>
							<div class="form-group">
								{!!Form::label('injectionName', 'Injeccion')!!}
								{!!Form::select('injectionName',$injection,["class" => "form-control"])!!}
								
							</div>
							 <div class="form-group">
                            <label for="dateApplication">Fecha de Aplicación</label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" name="dateApplication">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="boosterInjection">Proxima Aplicación</label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" name="boosterInjection">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>


                			
            				
            				

							<div class="form-group">
								{!!Form::label('dose', 'Dosis')!!}
								{!! Form::text('dose', null,["class" => "form-control"]) !!}
							</div>

							<div class="form-group">
								{!!Form::label('responsible', 'Responsable')!!}
								{!! Form::text('responsible', null, ["class" => "form-control"]) !!}
							</div>
							
							<div class="form-group">
								{!! Form::submit('Ejecutar Injección', ["class" => "btn btn-success btn-block"]) !!}
							</div>
 							

 
					{!! Form::close() !!}


                    </div>
				 
                     

	
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