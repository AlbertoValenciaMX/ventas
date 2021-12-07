@extends('layouts.app')

@section('template_title')
    {{ $compra->name ?? 'Show Compra' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Compra</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('compras.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idproveedores:</strong>
                            {{ $compra->idProveedores }}
                        </div>
                        <div class="form-group">
                            <strong>Idtipocompra:</strong>
                            {{ $compra->idTipoCompra }}
                        </div>
                        <div class="form-group">
                            <strong>Idmetodopago:</strong>
                            {{ $compra->idMetodoPago }}
                        </div>
                        <div class="form-group">
                            <strong>Fechacompra:</strong>
                            {{ $compra->fechaCompra }}
                        </div>
                        <div class="form-group">
                            <strong>Fechapago:</strong>
                            {{ $compra->fechaPago }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $compra->total }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
