@extends('app')
 
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Registro Sanitario</div>

 
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

				<!--@include('partials.messages')--> 
                        {!! Form::model($injection, ['route' => ['animal.update',$injection->id], 'method' => 'PUT', 'files' => 'true']) !!}
                            <img src="/img/injections/{{$injection->image}}" alt="{{$injection->name}}">   
                            @include('injections.partials.fields')
                            
                            <button type="submit" class="btn btn-default">Actualizar Inyeccion</button>
                        {!! Form::close() !!}

				</div>

	
			</div>
		</div>
	</div>


    
</div>
@endsection