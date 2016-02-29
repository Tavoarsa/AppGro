@extends('app')
 
@section('content')
  <div class="container">

    <div class="panel-body">

      <div>
        <div>
        <h3>{{$animals}}</h3>
         <div class="table-responsive"> 
                          <h3>Ingresos Produccion Lechera</h3>                   
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Total de Kilos</th>                               
                                <th>Promedio Kilos Diario</th>
                                <th>Total de Ingresos</th>
                                <th>Ingresos Diarios</th>
                                
                                               
                              </tr>
                            </thead>
                            <tbody> 
                                    
                            <tr>              
                                <td>{{$total_production}}</td>                             
                                <td>{{$promedio_dia}}</td>               
                                <td>¢{{$ganancia_produccion }}</td>           
                                <td>¢{{$ganacia_dia }}</td>
                                
                            </tr> 
                                             
                            </tbody>

                          </table>
                           
          </div>
            <div class="table-responsive"> 
                          <h3>Valor de Productos Consumidos</h3>                   
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Total Gastos</th>                               
                                <th>Promedio por Dia</th>                               
                                
                                               
                              </tr>
                            </thead>
                            <tbody> 
                                    
                            <tr>              
                                <td>{{$gatos_dia}}</td>                             
                                <td>{{$total_gastos}}</td>               
                                
                                
                            </tr> 
                                             
                            </tbody>

                          </table>
                           
          </div>
        </div>
        @piechart('IMDB', 'chart-div')
        <div id="chart-div"></div>
      </div>
      <div align="center"><h2>{{$estado}}</h2></div>    
    </div>				
</div>
@endsection
          