<div class="form-group">
    {!! form::label('name','Nombre')!!}
    {!! form::text('name',null,['class' => 'form-control']) !!}
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
    {!! form::label('sizes','Tamaño')!!}
    <input type="number" step="any"   name="sizes">
</div>
<div class="form-group">
    {!! form::label('prices','Precio')!!}
    {!! form::text('prices',null,array("class" => "form-control", 'placeholder' => 'Precio en colones')) !!}
</div>
 <div class="form-group">
                            <label for="fechaVencimiento">Fecha Vencimiento</label>
                            <div class="input-group">
                              <input type="text" class="form-control datepicker" name="fechaVencimiento">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>
 <div class="form-group">
    {!! form::label('image','Imagen')!!}   
    {!! form::file('image',null,['class' => 'form-control']) !!}
</div>
   			


