@extends('app')
 
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"></div>     

				
 
				<div class="panel-body" >


				 <div class="row">
                            

                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{url('animal/') }}">
                                    	<img src="/img/portal/vaca.jpg" alt="Registro Sanitario">
                                    </a> 
                                    <H4>Animal</H4>                
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                 <div class="thumbnail">
                                    <a href="{{url('farm/') }}">
                                        <img src="/img/portal/vaca.jpg" alt="Registro Sanitario">
                                    </a> 
                                    <H4>Finca</H4>                
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{url('report/') }}">
                                    	<img src="/img/portal/vaca.jpg" alt="Control Alimenticio">
                                    </a> 
                                     <H4>Reportes</H4>                
                                </div>
                            </div>

                              <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{url('veterinaria/') }}">
                                        <img src="/img/portal/vaca.jpg" alt="Control Alimenticio">
                                    </a> 
                                     <H4>Veterinaria</H4>                
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{url('animal/milk_production') }}">
                                        <img src="/img/portal/vaca.jpg" alt="Control Alimenticio">
                                    </a> 
                                     <H4>Estadisticas</H4>                
                                </div>
                            </div>
                             <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{url('calendar/') }}">
                                        <img src="/img/portal/vaca.jpg" alt="Control Alimenticio">
                                    </a> 
                                     <H4>Calendario</H4>                
                                </div>
                            </div>

                             <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{url('calendar/') }}">
                                        <img src="/img/portal/vaca.jpg" alt="Control Alimenticio">
                                    </a> 
                                     <H4>Chat</H4>                
                                </div>
                            </div>
                             <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{url('food__supplement/') }}">
                                        <img src="/img/portal/vaca.jpg" alt="Control Alimenticio">
                                    </a> 
                                     <H4>Alimentación</H4>                
                                </div>
                            </div>

                             <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{url('animal/milk_production') }}">
                                        <img src="/img/portal/vaca.jpg" alt="Control Alimenticio">
                                    </a> 
                                     <H4>Noticias</H4>                
                                </div>
                            </div>
                            
                            
                                                   
                        </div>
				               

				</div>

				 
				 
                     

	
			</div>
		</div>
	</div>


    
</div>
@endsection