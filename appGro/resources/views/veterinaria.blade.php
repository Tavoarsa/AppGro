@extends('app')
 
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
                                @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
				<div class="panel-heading">Veterinaria</div>     

				
 
				<div class="panel-body" >


				 <div class="row">                            

                             <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{url('injection/') }}">
                                        <img src="/img/injections/injection.jpg" alt="Registro Sanitario">
                                    </a> 
                                     <H4>Inyecciones</H4>                
                                </div>
                            </div>

                             <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{url('vaccine/') }}">
                                        <img src="/img/injections/injection.jpg" alt="Registro Sanitario">
                                    </a> 
                                     <H4>Vacunas</H4>                
                                </div>
                            </div>

                               <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{url('disease/') }}">
                                        <img src="/img/injections/injection.jpg" alt="Registro Sanitario">
                                    </a> 
                                     <H4>Enfermedades</H4>                
                                </div>
                            </div>
                            
                            
                                                   
                        </div>
				               

				</div>

				 
				 
                     

	
			</div>
		</div>
	</div>


    
</div>
@endsection