@extends('layouts.app')

@section('template_title')
    {{ $pedido->name ?? 'Show Pedido' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Pedido</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pedidos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idproducto:</strong>
                            {{ $pedido->idProducto }}
                        </div>
                        <div class="form-group">
                            <strong>Idcliente:</strong>
                            {{ $pedido->idCliente }}
                        </div>
                        <div class="form-group">
                            <strong>Idvendedor:</strong>
                            {{ $pedido->idVendedor }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $pedido->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Subtotal:</strong>
                            {{ $pedido->subTotal }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
