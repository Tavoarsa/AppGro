@extends('app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="panel panel-default">               
                
                    <div class="panel-heading">
                    <div align="right">
                    <a href="{{ url('/animal/') }}" class="button"><span class="glyphicon glyphicon-circle-arrow-left"></span></a>
                     
                    </div>
                
                </div>      
                       

                    
                    
                    @include('partials.messages')  
                    <div class="panel-body">
                        <!--@include('partials.messages')--> 
                        {!! Form::model($animal, ['route' => ['animal.update',$animal->id], 'method' => 'PUT', 'files' => 'true']) !!}
                          

                            <div class="form-group">
                                {!!Form::label('nombre', 'Nombre Animal')!!}
                                {!!Form::text('nombre', null, ["class" => "form-control"]) !!}
                            </div>
                           
                            <div class="form-group">
                                {!!Form::label('raza', 'Raza')!!}
                                {!! Form::select('raza', array('holsten' => 'Holsten', 'yersey' => 'Yersey','guir' => 'Guir'), 'Holtein',["class" => "form-control"])!!}
                            </div>

                             <div class="form-group">
                            <label for="fechaMuerte">Fecha Muerte</label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" name="fechaMuerte">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>
                            
                            <div class="form-group">
                                {!!Form::label('caracteristicas', 'Caracteristicas')!!}
                                {!! Form::text('caracteristicas', null, array("class" => "form-control", 'placeholder' => 'Observaciones')) !!}
                            </div>

                                <div class="controls">
                                {!!Form::label('image', 'Foto')!!}
                                
                                <input type="file" name="image"> 
                                                            
                             </div>

                            
                            
                            <button type="submit" class="btn btn-default">Actualizar Datos</button>
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
