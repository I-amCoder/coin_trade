@extends('backend.layout.master')


@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __($pageTitle) }}</h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-end">
                            <a href="{{ route('admin.coins.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i>
                                {{ __('Coin') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection



