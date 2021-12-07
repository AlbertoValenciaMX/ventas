<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('idProveedores') }}
            {{ Form::text('idProveedores', $compra->idProveedores, ['class' => 'form-control' . ($errors->has('idProveedores') ? ' is-invalid' : ''), 'placeholder' => 'Idproveedores']) }}
            {!! $errors->first('idProveedores', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idTipoCompra') }}
            {{ Form::text('idTipoCompra', $compra->idTipoCompra, ['class' => 'form-control' . ($errors->has('idTipoCompra') ? ' is-invalid' : ''), 'placeholder' => 'Idtipocompra']) }}
            {!! $errors->first('idTipoCompra', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idMetodoPago') }}
            {{ Form::text('idMetodoPago', $compra->idMetodoPago, ['class' => 'form-control' . ($errors->has('idMetodoPago') ? ' is-invalid' : ''), 'placeholder' => 'Idmetodopago']) }}
            {!! $errors->first('idMetodoPago', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaCompra') }}
            {{ Form::text('fechaCompra', $compra->fechaCompra, ['class' => 'form-control' . ($errors->has('fechaCompra') ? ' is-invalid' : ''), 'placeholder' => 'Fechacompra']) }}
            {!! $errors->first('fechaCompra', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaPago') }}
            {{ Form::text('fechaPago', $compra->fechaPago, ['class' => 'form-control' . ($errors->has('fechaPago') ? ' is-invalid' : ''), 'placeholder' => 'Fechapago']) }}
            {!! $errors->first('fechaPago', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('total') }}
            {{ Form::text('total', $compra->total, ['class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''), 'placeholder' => 'Total']) }}
            {!! $errors->first('total', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>