<div class="form-group">
     {!!Form::label('typeProduct', 'Tipo de Alimento')!!}
     {!! Form::select('typeProduct', array('concentrado' => 'Concentrado', 'silo' => 'Silo','mineral' => 'Mineral','vitamina' => 'Vitamina'), 'Concetrado',["class" => "form-control"])!!}
</div>
<div class="form-group">
    {!! form::label('nameProduct','Nombre Producto')!!}
    {!! form::text('nameProduct',null,['class' => 'form-control']) !!}
</div>

 <div class="form-group">
    {!!Form::label('idProvider', 'Proveedor')!!}
    {!!Form::select('idProvider',$providers,["class" => "form-control"])!!}
</div> 

<div class="form-group">
    {!! form::label('weight','Peso')!!}
    {!! form::text('weight',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! form::label('price','Precio')!!}
    {!! form::text('price',null,['class' => 'form-control']) !!}
</div>

 {!!Form::label('due_date', 'Fecha Vencimiento')!!}
  <div class='input-group date' id='due_date'>
 {!! Form::input('text', 'due_date',null,['class'=>'form-control']) !!}
 <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
 </div>      
 

