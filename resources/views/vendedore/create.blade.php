@extends('layouts.app')

@section('template_title')
    Create Vendedore
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Vendedore</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('vendedores.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('vendedore.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
