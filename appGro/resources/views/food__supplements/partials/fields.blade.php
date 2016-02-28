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
 

