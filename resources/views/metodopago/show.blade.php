@extends('layouts.app')

@section('template_title')
    {{ $metodopago->name ?? 'Show Metodopago' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Metodopago</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('metodopagos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $metodopago->descripcion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
