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
                        @if (count($coins) < 2)
                            <div class="card-header justify-content-end">
                                <button data-href="{{ route('admin.coins.store') }}" class="btn btn-primary addCoin"> <i
                                        class="fa fa-plus"></i>
                                    {{ __('Coin') }}</button>
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="row justify-content-center">
                                @foreach ($coins as $coin)
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card shadow h-100">
                                            <div class="card-body text-center">
                                                <h5>{{ $coin->name }}</h5>
                                                <p>Current Price:
                                                    {{ number_format($coin->current_price, 2) . ' ' . @$general->site_currency }}
                                                </p>
                                                <img style="max-width: 200px; object-fit: cover"
                                                    src="{{ getFile('Coins', $coin->logo) }}" alt="logo">
                                            </div>
                                            <div class="card-footer">
                                                <button data-href="{{ route('admin.coins.update', $coin->id) }}"
                                                    data-coin="{{ json_encode($coin) }}"
                                                    class="btn btn-warning editCoin">Edit</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="coinModal">
        <div class="modal-dialog ">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add New Coin</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <input hidden name="_method">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="form-label">Coin Name</label>
                            <input name="name" value="{{ old('name') }}" type="text" id="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Coin Name" required>
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Initial Price</label>
                            <div class="input-group">
                                <input type="number" step="any"
                                    class="form-control @error('price') is-invalid @enderror" name="price"
                                    value="{{ old('price') }}" placeholder="Coin Price">
                                <div class="input-group-append">
                                    <div class="input-group-text">{{ @$general->site_currency }}</div>
                                </div>
                            </div>
                            @error('price')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Coin Minimum Price</label>
                            <div class="input-group">
                                <input type="number" step="any"
                                    class="form-control @error('minimum_price') is-invalid @enderror" name="minimum_price"
                                    value="{{ old('minimum_price') }}" placeholder="Coin Minimum Price">
                                <div class="input-group-append">
                                    <div class="input-group-text">{{ @$general->site_currency }}</div>
                                </div>
                            </div>
                            @error('minimum_price')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Coin Maximum Price</label>
                            <div class="input-group">
                                <input type="number" step="any"
                                    class="form-control @error('maximum_price') is-invalid @enderror" name="maximum_price"
                                    value="{{ old('maximum_price') }}" placeholder="Coin Maximum Price">
                                <div class="input-group-append">
                                    <div class="input-group-text">{{ @$general->site_currency }}</div>
                                </div>
                            </div>
                            @error('maximum_price')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Logo</label>
                            <input type="file" accept=".jpg, .png, .jpeg, .webp" step="any"
                                class="form-control @error('logo') is-invalid @enderror" name="logo"
                                value="{{ old('logo') }}" placeholder="Coin Maximum Price">
                            @error('logo')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $(".addCoin").click(function(e) {
                e.preventDefault();
                var modal = $("#coinModal");
                modal.find('form').attr('action', $(this).data('href'));
                modal.find('input[name=_method]').val("POST");
                modal.modal('show');
            });

            $(".editCoin").click(function(e) {
                e.preventDefault();
                var modal = $("#coinModal");
                modal.find('form').attr('action', $(this).data('href'));

                modal.find('input[name=_method]').val("PUT");
                modal.find('input[name=name]').val($(this).data('coin').name);
                modal.find('input[name=price]').val($(this).data('coin').current_price);
                modal.find('input[name=minimum_price]').val($(this).data('coin').minimum_price);
                modal.find('input[name=maximum_price]').val($(this).data('coin').maximum_price);
                modal.modal('show');
            });

            $("#coinModal").on('hidden.bs.modal', function() {
                var modal = $("#coinModal");
                modal.find('input[name=name]').val('');
                modal.find('input[name=price]').val('');
                modal.find('input[name=minimum_price]').val('');
                modal.find('input[name=maximum_price]').val('');
                modal.find('input[name=_method]').val('');
                modal.find('input[name=logo]').val('');

            });

            @if (Session::has('errors'))
                $("#coinModal").modal('show');
            @endif
        });
    </script>
@endpush
