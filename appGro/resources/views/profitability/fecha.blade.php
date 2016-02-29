@extends('app')
 
@section('content')

<div class="container">

<div class="form-group">
                            <label for="fecha">Fecha</label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" name="fecha" >
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
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
          