@extends('app')
 
@section('content')

<div class="container">
	
		
			
				<div class="panel-heading"></div>     

				
 
				<div class="panel-body" >


				
                            

                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{url('animal/') }}">
                                    	<img src="/img/portal/ALIMENTO.jpg" alt="Registro Sanitario">
                                    </a> 
                                    <H4>Animal</H4>                
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                 <div class="thumbnail">
                                    <a href="{{url('farm/show') }}">
                                        <img src="/img/portal/FINCA.jpg" alt="Registro Sanitario">
                                    </a> 
                                    <H4>Finca</H4>                
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{url('report/') }}">
                                    	<img src="/img/portal/REPORTE.jpg" alt="Control Alimenticio">
                                    </a> 
                                     <H4>Reportes</H4>                
                                </div>
                            </div>

                              <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{url('veterinaria/') }}">
                                        <img src="/img/portal/VETERINARIA.jpg" alt="Control Alimenticio">
                                    </a> 
                                     <H4>Veterinaria</H4>                
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{url('profitability/') }}">
                                        <img src="/img/portal/ESTADISTICA.jpg" alt="Control Alimenticio">
                                    </a> 
                                     <H4>Estadisticas</H4>                
                                </div>
                            </div>
                             <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{url('calendar/') }}">
                                        <img src="/img/portal/CALENDARIO.jpg" alt="Control Alimenticio">
                                    </a> 
                                     <H4>Calendario</H4>                
                                </div>
                            </div>

                             <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="https://www.facebook.com/profile.php?id=100011519581887">
                                        <img src="/img/portal/FACEBOOK.jpeg" alt="Control Alimenticio">
                                    </a> 
                                     <H4>Social</H4>                
                                </div>
                            </div>
                             <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{url('food__supplement/') }}">
                                        <img src="/img/portal/alimentos.jpeg" alt="Control Alimenticio">
                                    </a> 
                                     <H4>Alimentación</H4>                
                                </div>
                            </div>

                             <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{url('animal/milk_production') }}">
                                        <img src="/img/portal/NOTICIAS.jpeg" alt="Control Alimenticio">
                                    </a> 
                                     <H4>Noticias</H4>                
                                </div>
                            </div>
                            
                            
                                                   
                        
				               

				</div>

				 
				 
                     

	
	


    
</div>
@endsection