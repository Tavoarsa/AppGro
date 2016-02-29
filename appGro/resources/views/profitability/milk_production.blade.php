@extends('app')
 
@section('content')


<div class="container">
<div class="panel-body">

					{!! Form::open(array('url' => 'profitability/milk_production')) !!}

							<div hidden class="form-group">
						

       						  {!!Form::text('ia','is') !!}
       						 
       						 	
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
								{!! Form::submit('Buscar', ["class" => "btn btn-success btn-block"]) !!}
							</div>
 
					{!! Form::close() !!}
				</div>



                           


   @columnchart('MilkProduction', 'perf_div')


<div id="perf_div"></div>
    
</div>

  <script>
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true
    });
</script>

@endsection
          