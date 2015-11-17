@extends('app')
 
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>
				@include('vaccinationControls.partials.menu')   
 
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

				
 
				<div class="panel-body">
					{!! Form::open(['route' => 'vaccinationControl.store','class' =>'form','novalidate' =>'novalidate','files' => true]) !!}


							<div  class="form-group">
								{!!Form::label('animalName', 'Animal')!!}
								{!!Form::select('animalName',$animal,["class" => "form-control"])!!}
							</div>

							<div class="form-group">
								{!!Form::label('diseaseName', 'Enfermedad')!!}
								{!!Form::select('diseaseName',$disease,["class" => "form-control"])!!}
								
							</div>
							<div class="form-group">
								{!!Form::label('vaccineName', 'Vacuna')!!}
								{!!Form::select('vaccineName',$vaccine,["class" => "form-control"])!!}
								
							</div>

                			<div class="form-group">
                				{!!Form::label('dateApplication', 'Fecha de aplicación')!!}
                    			<div class='input-group date' id='dateApplication'>
                       			<!-- <input type='text' name= 'from' class='form-control' readonly/>-->

                       			{!! Form::input('text', 'dateApplication',null,['class'=>'form-control']) !!}
                       			 <span class="input-group-addon"><span class="glyphicon glyphicon-calendar "></span>
                    			</div>
               				 </div>
               				 <div class="form-group">
               				 	{!!Form::label('boosterInjection', 'Fecha Proxima aplicación')!!}
                    			<div class='input-group date' id='boosterInjection'>
                       			<!-- <input type='text' name= 'from' class='form-control' readonly/>-->
                       			{!! Form::input('text', 'boosterInjection',null,['class'=>'form-control']) !!}
                       			 <span class="input-group-addon"><span class="glyphicon glyphicon-calendar "></span>
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
								{!! Form::submit('Ejecutar Vacuna', ["class" => "btn btn-success btn-block"]) !!}
							</div>
 							

 
					{!! Form::close() !!}
				</div>
				 <script type="text/javascript">

           
                $('#dateApplication').datetimepicker({
                	defaultDate: new Date()
                    

                 });
                   $('#boosterInjection').datetimepicker({


                 });
                 
        </script>

	
			</div>
		</div>
	</div>
</div>
@endsection