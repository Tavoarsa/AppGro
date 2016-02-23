@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">                
                
                    <div class="panel-heading">
                <a href="{{ url('/animal') }}" class="btn btn-info" role="button">Catalogo Animal</a>       
                @include('partials.messages')                      

                    
                    </div>
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
                                {!!Form::label('fechaMuerte', 'Fecha Muerte')!!}
                                {!!Form::text('fechaMuerte', null, ["class" => "form-control"]) !!}
                            </div>
                            <div class="form-group">
                                {!!Form::label('caracteristicas', 'Caracteristicas')!!}
                                {!! Form::text('caracteristicas', null, array("class" => "form-control", 'placeholder' => 'Observaciones')) !!}
                            </div>

                            <div class="controls">
                                {!!Form::label('image', 'Foto')!!}
                                
                                <input type="file" name="image" required> 
                                                            
                             </div>

                            
                            
                            <button type="submit" class="btn btn-default">Actualizar Datos</button>
                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
