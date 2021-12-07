@extends('layouts.app')

@section('template_title')
    Create Metodopago
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Metodopago</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('metodopagos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('metodopago.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
