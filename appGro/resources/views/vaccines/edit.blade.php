@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ url('/vaccine') }}" class="btn btn-info" role="button">Listado de Vacunas</a>

                        
                    </div>
                    <div class="panel-body">
                        <!--@include('partials.messages')--> 
                        {!! Form::model($vaccine, ['route' => ['vaccine.update',$vaccine->id], 'method' => 'PUT', 'files' => 'true']) !!}
                             
                            @include('vaccines.partials.fields')
                            
                            <button type="submit" class="btn btn-default">Actualizar Vacuna</button>
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



