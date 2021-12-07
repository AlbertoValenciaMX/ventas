@extends('layouts.app')

@section('template_title')
    {{ $vendedore->name ?? 'Show Vendedore' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Vendedore</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('vendedores.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $vendedore->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $vendedore->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $vendedore->email }}
                        </div>
                        <div class="form-group">
                            <strong>Rfc:</strong>
                            {{ $vendedore->rfc }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
