@extends('app')
 
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Nueva Vacuna</div> 
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
					{!! Form::open(['route' => 'vaccine.store', 'method' => 'POST', 'files' => 'true']) !!}
                    @include('vaccines.partials.fields')                                                                             
                     <button type="submit" class="btn btn-default">Guardar Vacuna</button>
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