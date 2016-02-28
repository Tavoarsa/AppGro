@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        
                <div align="right">
                    <a href="{{ url('/food__supplement/') }}" class="button"><span class="glyphicon glyphicon-circle-arrow-left"></span></a>
                </div>
                

                       
                    </div>
                    <div class="panel-body">
                        <!--@include('partials.messages')--> 
                        
                        {!! Form::model($food__supplements, ['route' => ['food__supplement.update',$food__supplements->id], 'method' => 'PUT', 'files' => 'true']) !!}
                             
                            @include('food__supplements.partials.fields')                            
                            <button type="submit" class="btn btn-default">Actualizar</button>
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



