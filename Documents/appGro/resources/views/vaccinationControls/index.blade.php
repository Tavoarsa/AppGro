@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                     @include('vaccinationControls.partials.menu')   
                       
                    </div>
  
    <div class="panel-body">
        
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Enfermedad</th>
        <th>Edad de Vacunacion</th>
        <th>Revacunación</th>
       
      </tr>
    </thead>
    <tbody>
      @foreach($diseases as $diseases)
      <tr>
        <td>{{$diseases->name }}</td>
        <td>{{$diseases->vaccinationAge }}</td>
        <td>{{$diseases->boosterInjection }}</td>
        </tr>
     @endforeach

    </tbody>
  </table>
  </div>
</div>

        
    </div>           
                </div>
            </div>
        </div>
    </div>
@endsection