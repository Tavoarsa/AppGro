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
                                    <a href="{{url('injection/') }}">
                                        <img src="/img/portal/vaca.jpg" alt="Control Alimenticio">
                                    </a> 
                                     <H4>Inyecciones</H4>                
                                </div>
                            </div>

                             <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{url('vaccine/') }}">
                                        <img src="/img/portal/vaca.jpg" alt="Control Alimenticio">
                                    </a> 
                                     <H4>Vacunas</H4>                
                                </div>
                            </div>
                            
                            
                                                   
                        </div>
				               

				</div>

				 
				 
                     

	
			</div>
		</div>
	</div>


    
</div>
@endsection