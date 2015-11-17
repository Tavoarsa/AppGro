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
					<div class="table-responsive">          
					  <table class="table">
					    <thead>
					      <tr>
					        <th>Animal</th>
					        <th>Enfermedad</th>
					        <th>Vacuna Aplicada</th>
					        <th>Fecha Aplicada</th>
					        <th>Dosis</th>
					        <th>Revacunación</th>
					       
					      </tr>
					    </thead>
					    <tbody>	
					     @foreach($reports as $report) 				
					    <tr>	
					     	
					        <td>{{$report->animalName }}</td> 			          
					        <td>{{$report->diseaseName }}</td>
					        <td>{{$report->vaccineName }}</td>					     
					        <td>{{$report->dateApplication }}</td>			     
				             <td>{{$report->dose }}</td>
				            		         
   					        <td>{{$report->boosterInjection }}</td>

					     </tr> 
					       @endforeach
					    	
					    </tbody>
					  </table>
					  </div>
					
				</div>
				

	
			</div>
		</div>
	</div>
</div>
@endsection