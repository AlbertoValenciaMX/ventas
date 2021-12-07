<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('idPedido') }}
            {{ Form::text('idPedido', $venta->idPedido, ['class' => 'form-control' . ($errors->has('idPedido') ? ' is-invalid' : ''), 'placeholder' => 'Idpedido']) }}
            {!! $errors->first('idPedido', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idTipoVenta') }}
            {{ Form::text('idTipoVenta', $venta->idTipoVenta, ['class' => 'form-control' . ($errors->has('idTipoVenta') ? ' is-invalid' : ''), 'placeholder' => 'Idtipoventa']) }}
            {!! $errors->first('idTipoVenta', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idMetodoPago') }}
            {{ Form::text('idMetodoPago', $venta->idMetodoPago, ['class' => 'form-control' . ($errors->has('idMetodoPago') ? ' is-invalid' : ''), 'placeholder' => 'Idmetodopago']) }}
            {!! $errors->first('idMetodoPago', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idPromocion') }}
            {{ Form::text('idPromocion', $venta->idPromocion, ['class' => 'form-control' . ($errors->has('idPromocion') ? ' is-invalid' : ''), 'placeholder' => 'Idpromocion']) }}
            {!! $errors->first('idPromocion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaCompra') }}
            {{ Form::text('fechaCompra', $venta->fechaCompra, ['class' => 'form-control' . ($errors->has('fechaCompra') ? ' is-invalid' : ''), 'placeholder' => 'Fechacompra']) }}
            {!! $errors->first('fechaCompra', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaPago') }}
            {{ Form::text('fechaPago', $venta->fechaPago, ['class' => 'form-control' . ($errors->has('fechaPago') ? ' is-invalid' : ''), 'placeholder' => 'Fechapago']) }}
            {!! $errors->first('fechaPago', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('total') }}
            {{ Form::text('total', $venta->total, ['class' => 'form-control' . ($errors->has('total') ? ' is-invalid' : ''), 'placeholder' => 'Total']) }}
            {!! $errors->first('total', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>