@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ url('/injection') }}" class="btn btn-info" role="button">Listado de Inyecciones</a>
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
                    </div>
                        <div class="panel-body">
                        <!--@include('partials.messages')--> 
                         {!! Form::model($injection, ['route' => ['injection.update',$injection->id], 'method' => 'PUT', 'files' => 'true']) !!}
                         @include('injections.partials.fields')
                          <button type="submit" class="btn btn-default">Actualizar Inyeccion</button>
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





                  



                    
     
     