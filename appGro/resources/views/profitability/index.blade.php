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

               
                <div class="panel-heading">
                <div align="right"><a href="{{ url('/portal/') }}" class="button"><span class="glyphicon glyphicon-circle-arrow-left"></span></a>

                </div>
                 <h2>Rentabilidad Animal</h2>



                </div>


                          
                                

                
 
                <div class="panel-body" >
                


                 <div class="row">

                    @if(count($animals)==0)
                     <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                                                 
                                       <a ><img src="/img/no_encontrada.jpg" ></a>           
                                    
                                </div>
                            </div>

                     


                    @endif
                            @foreach($animals as $animal)


                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                <h3>{{$animal->nombre}}</h3>                                      
                                       <a  href="{{url('profitability/milk_production',$animal->id) }}">
                                            <img src="/img/animal/{{$animal->image}}" alt="{{$animal->nombre}}">                                    </a> 
                                 
                                    
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