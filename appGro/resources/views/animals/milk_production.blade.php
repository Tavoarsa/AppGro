@extends('app')
 
@section('content')
<div  class="container-fluid">
    <div class="panel panel-default">
    
                <div class="panel-heading">Produccion de Leche</div>
 
                @if($errors->any())
                <p>Corregir los siguientes erroress</p>
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


                    {!! Form::open(array('url'=>'animal/milk_production/update_milk_production','method'=>'POST', 'files'=>true)) !!}
                            
                             <div class="form-group">
                                {!!Form::label('price', 'Precio x kilo')!!}
                                {!!Form::text('price',null,["class" => "form-control"])!!}
                                
                            </div>
                             <div  hidden class="form-group">
                                {!!Form::label('animalName', 'Animal')!!}
                                {!!Form::select('animalName',$animals,["class" => "form-control"])!!}
                            </div>                           

                            <div class="form-group">
                                {!!Form::label('cantidad', 'Cantidad')!!}
                                {!!Form::text('cantidad',null,["class" => "form-control"])!!}
                                
                            </div>
                              

                                                                           
                            
                            <div class="form-group">
                                {!! Form::submit('Guardar', ["class" => "btn btn-success btn-block"]) !!}
                            </div> 
                    {!! Form::close() !!}



                                <table class= "table">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Animal</th>
                                            <th>Mañana</th>
                                            <th>Tarde</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($milk_productions as $milk_production)
                                        <tr>
                                            <td>{{$milk_production->date }}</td>
                                            <td>{{$milk_production->nombre }}</td>
                                            <td>{{$milk_production->morning_production }}</td>
                                            <td>{{$milk_production->later_production}}</td>
                                            

                                        </tr>
                                        @endforeach    
                                    </tbody>
                                    

                                </table>
                           
                </div>


            </div>
        </div>
        
</div>
@endsection