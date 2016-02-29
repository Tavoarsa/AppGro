@extends('app')
 
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <h2>Rentabilidad Animal</h2>
                <div class="panel-heading">               
                

                 
    
                
                </div>


                          
                                

                
 
                <div class="panel-body" >
                


                 <div class="row">
                            @foreach($animals as $animal)

                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                <h3>{{$animal->nombre}}</h3>                                      
                                       <a  href="{{url('profitability/milk_production',$animal->id) }}">
                                            <img src="/img/animal/{{$animal->image}}" alt="{{$animal->nombre}}">                                    </a> 
                                 
                                    <div class="caption">
                                    
                                        

                                    </div>
                                </div>
                            </div>
                            @endforeach                           
                        </div>
                               

                </div>

                 
                 
                     

    
            </div>
        </div>
    </div>


    
</div>
   <script>
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true
    });
</script>
@endsection