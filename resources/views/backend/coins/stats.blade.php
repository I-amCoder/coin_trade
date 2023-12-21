@extends('backend.layout.master')
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/he/1.2.0/he.min.js"
        integrity="sha512-PEsccDx9jqX6Dh4wZDCnWMaIO3gAaU0j46W//sSqQhUQxky6/eHZyeB3NrXD2xsyugAKd4KPiDANkcuoEa2JuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
@endpush
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __($pageTitle) }}</h1>
            </div>

            <div class="row">
                @foreach ($coins as $coin)
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>{{ $coin->name }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        @include('common.chart', ['coin' => $coin])
                                    </div>
                                    <div class="col-md-6">
                                        <form action="{{ route('admin.coins.bounderies.update', $coin->id) }}"
                                            method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="" class="form-label">Coin Minimum Price</label>
                                                <div class="input-group">
                                                    <input type="number" step="any"
                                                        class="form-control @error('minimum_price_' . $coin->id) is-invalid @enderror"
                                                        name="minimum_price_{{ $coin->id }}"
                                                        value="{{ old('minimum_price_' . $coin->minimum_price, $coin->minimum_price) }}"
                                                        placeholder="Coin Minimum Price">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">{{ @$general->site_currency }}</div>
                                                    </div>
                                                </div>
                                                @error('minimum_price_' . $coin->id)
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="form-label">Coin Maximum Price</label>
                                                <div class="input-group">
                                                    <input type="number" step="any"
                                                        class="form-control @error('maximum_price_' . $coin->id) is-invalid @enderror"
                                                        name="maximum_price_{{ $coin->id }}"
                                                        value="{{ old('maximum_price' . $coin->maximum_price, $coin->maximum_price) }}"
                                                        placeholder="Coin Maximum Price">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">{{ @$general->site_currency }}</div>
                                                    </div>
                                                </div>
                                                @error('maximum_price_' . $coin->id)
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <button type="submit"class="btn btn-info">Update</button>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <form action="{{ route('admin.coins.price.update', $coin->id) }}" method="POST">
                                            @csrf
                                            <h5>Current Coin Price <span
                                                    id="coin_price_{{ $coin->id }}">{{ $coin->current_price }}</span>{{ @$general->site_currency }}
                                            </h5>
                                            <div class="form-group">
                                                <label for="" class="form-label">Coin Current Price</label>
                                                <div class="input-group">
                                                    <input type="number" step="any"
                                                        class="form-control @error('price_' . $coin->id) is-invalid @enderror"
                                                        name="price_{{ $coin->id }}"
                                                        value="{{ old('price_' . $coin->current_price, $coin->current_price) }}"
                                                        placeholder="Coin Minimum Price">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">{{ @$general->site_currency }}</div>
                                                    </div>
                                                </div>
                                                @error('price_' . $coin->id)
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <button type="submit"class="btn btn-warning">Update</button>
                                        </form>
                                    </div>

                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </section>
    </div>
@endsection


@push('script')
    @include('backend.coins.script')
@endpush
