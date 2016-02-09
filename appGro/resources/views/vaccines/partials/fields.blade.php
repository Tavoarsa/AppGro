<div class="form-group">
    {!! form::label('nameV','Nombre')!!}
    {!! form::text('nameV',null,['class' => 'form-control']) !!}
</div>

 <div class="form-group">
    {!!Form::label('idProvider', 'Proveedor')!!}
    {!!Form::select('idProvider',$providers,["class" => "form-control"])!!}
</div> 

<div class="form-group">
    {!! form::label('indications','Indicaciones')!!}
    {!! form::text('indications',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! form::label('Dosage','Posoligia')!!}
    {!! form::text('Dosage',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! form::label('composition','Composición')!!}
    {!! form::text('composition',null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! form::label('application','Aplicaciones')!!}
    {!! form::text('application',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! form::label('precautions','Precauciones')!!}
    {!! form::text('precautions',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! form::label('effects','Efectos')!!}
    {!! form::text('effects',null,['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! form::label('size','Tamaño')!!}
    {!! form::text('size',null,['class' => 'form-control']) !!}
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

 <div class="form-group">
    {!! form::label('image','Imagen')!!}   
    {!! form::file('image',null,['class' => 'form-control']) !!}
</div>
            
 

