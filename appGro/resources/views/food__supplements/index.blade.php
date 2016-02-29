@extends('app')

@section('content')

<div  class="container-fluid">
    
            <div class="panel panel-default">
                <div class="panel-heading">    
                    <a href="{{ url('/food__supplement/create') }}" class="btn btn-info" role="button">Nuevo Alimento</a>      

                        {!!Form::open(['route'=>'food__supplement.show','method'=>'GET', 'class'=>'navbar-form navbar-left pull-right', 'role'=>'search'])!!}

                        <div class="form-group">
                            {!!Form::text('nameProduct',null,['class'=>'form-control','placeholder'=>'Nombre de Alimento'])!!}
                        </div>
                        <button class= "btn btn-info" type="submit">Buscar</button> 

                        {!!Form::close()!!}
                 </div>                    
                    <div class="panel-body">
                    <div class="table-responsive"> 
                         <table class="table">
                            <tr>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Peso</th>
                                <th>Precio</th>                                 
                                <th>Vecimiento</th>
                                <th></th>
                            </tr>
                                @foreach($food__supplements as $food__supplement)
                            <tr>

                                <td>{{$food__supplement-> nameProduct}}</td>
                                <td>{{$food__supplement->typeProduct}}</td>
                                <td>{{$food__supplement->weight}}</td>                               
                                <td>{{$food__supplement->price}}</td>                                
                                <td>{{$food__supplement->due_date}}</td>
                                <td>
                                    <a href="{{url('food__supplements/edit',$food__supplement->id)}}" class="btn btn-warning btn-xs btn-detail ">Editar</a>
                                    
                                </td>
                            </tr>
                                @endforeach                
                        </table> 

                    </div>      
                    </div>          
            </div>
      
</div>

@endsection