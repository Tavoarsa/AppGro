@extends('app')

@section('content')
 
    
      

       <div class="container-narrow">
        <h2>Producción de Leche</h2>

        <h2 align="right">Gazilla</h2>
        
        <div>

            <!-- Table-to-load-the-data Part -->
            <table  class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>                        
                        <th>Fecha</th>
                        <th>Mañana</th>
                        <th>Tarde</th>
                        <th colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($milk_productions as $milk_production)
                    <tr>
                        <td>{{$milk_production->date}}</td>                        
                        <td>{{$milk_production->morning_production}}</td>
                        <td>{{$milk_production->later_production}}</td>
                        <td>
                            <button  class="btn btn-warning ">Actualizar</button>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        
        </div>
        <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    </div>
   
@endsection
 