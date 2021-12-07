@extends('layouts.app')

@section('template_title')
    {{ $venta->name ?? 'Show Venta' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Venta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ventas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idpedido:</strong>
                            {{ $venta->idPedido }}
                        </div>
                        <div class="form-group">
                            <strong>Idtipoventa:</strong>
                            {{ $venta->idTipoVenta }}
                        </div>
                        <div class="form-group">
                            <strong>Idmetodopago:</strong>
                            {{ $venta->idMetodoPago }}
                        </div>
                        <div class="form-group">
                            <strong>Idpromocion:</strong>
                            {{ $venta->idPromocion }}
                        </div>
                        <div class="form-group">
                            <strong>Fechacompra:</strong>
                            {{ $venta->fechaCompra }}
                        </div>
                        <div class="form-group">
                            <strong>Fechapago:</strong>
                            {{ $venta->fechaPago }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $venta->total }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
