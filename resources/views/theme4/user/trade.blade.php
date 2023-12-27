@extends(template() . 'layout.master2')

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/he/1.2.0/he.min.js"
        integrity="sha512-PEsccDx9jqX6Dh4wZDCnWMaIO3gAaU0j46W//sSqQhUQxky6/eHZyeB3NrXD2xsyugAKd4KPiDANkcuoEa2JuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
@endpush
@section('content2')
    <script>
        function getCountDown(elementId, seconds) {
            var times = seconds;

            var x = setInterval(function() {
                var distance = times * 1000;

                if (distance < 0) {
                    clearInterval(x);
                    $.ajax({
                        type: "get",
                        url: "/stop-trade",

                        success: function(response) {
                            window.location.reload();
                        },
                        error: function(error) {
                            console.log(err);
                            alert('error');
                        }
                    });
                    return;
                }
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById(elementId).innerHTML = days + "d " + hours + "h " + minutes + "m " +
                    seconds + "s ";
                times--;
            }, 1000);
        }
    </script>
    <div class="dashboard-body-part">
        <h3>Trade Coins</h3>
        <div class="row mt-3">
            <div class="col-12">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    @foreach ($coins as $coin)
                        <li class="nav-item w-50 text-center" style="border-width: 3px; border-radius: 5px">
                            <a class="nav-link
                            @if (Session::has('tabactive')) {{ Session::get('tabactive') == $coin->id ? 'active' : '' }} @else
                            {{ $loop->first ? 'active' : '' }} @endif

                            "
                                id="nav-{{ $coin->id }}-tab" data-bs-toggle="pill" role="tab"
                                href="#nav-{{ $coin->id }}"
                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $coin->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-12">
                <div class="tab-content" id="pills-tabContent">
                    @foreach ($coins as $coin)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="nav-{{ $coin->id }}"
                            role="tabpanel" aria-labelledby="nav-{{ $coin->id }}-tab">
                            <div class="row mb-4">
                                <div class="col-12">
                                    @include('common.chart', ['coin' => $coin])
                                </div>
                                <div class="col-12 text-center">
                                    <form id="trade-form{{ $coin->id }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="type">

                                        <div class="d-flex justify-content-center align-items-center">


                                            <div class="form-group px-1">
                                                <label for="" class="form-lable">Amount
                                                    ({{ @$general->site_currency }})
                                                </label>
                                                <div class="input-group">
                                                    <button class="btn gr-bg-8 mx-1 text-white btn-sm  downCoin"
                                                        data-href="{{ route('user.coin.trade', $coin->id) }}"
                                                        data-coin="{{ json_encode($coin) }}" type="button" href="#">
                                                        <i class="fa-solid fa-arrow-down"></i>
                                                    </button>
                                                    <span class="input-group-text minus-bid"
                                                        style="background: rgb(21, 20, 20)"
                                                        data-coin-id="{{ $coin->id }}"><i
                                                            class="fa fa-minus"></i></span>
                                                    <input required class="form-control"
                                                        name="trade_amount{{ $coin->id }}" value="0"
                                                        type="text">
                                                    <span class="input-group-text plus-bid"
                                                        style="background: rgb(21, 20, 20)"
                                                        data-coin-id="{{ $coin->id }}"><i
                                                            class="fa fa-plus"></i></span>
                                                </div>
                                            </div>
                                            <div class="form-group  px-1">
                                                <label for="" class="form-lable">Minutes</label>
                                                <div class="input-group">
                                                    <span class="input-group-text minus-time"
                                                        style="background: rgb(21, 20, 20)"
                                                        data-coin-id="{{ $coin->id }}"><i
                                                            class="fa fa-minus"></i></span>
                                                    <input required class="form-control"
                                                        name="trade_time{{ $coin->id }}" value="0" type="text">
                                                    <span class="input-group-text plus-time"
                                                        style="background: rgb(21, 20, 20)"
                                                        data-coin-id="{{ $coin->id }}"><i
                                                            class="fa fa-plus"></i></span>


                                                    <button class="btn gr-bg-3 mx-1 text-white btn-sm upCoin"
                                                        data-href="{{ route('user.coin.trade', $coin->id) }}"
                                                        data-coin="{{ json_encode($coin) }}" type="button" href="#">
                                                        <i class="fa-solid fa-arrow-up"></i>

                                                    </button>
                                                </div>

                                            </div>




                                        </div>
                                    </form>

                                    <div class="row mt-4">
                                        <div class="col-12">
                                            @if (count(auth()->user()->activeTrades($coin->id)) > 0)
                                                <div class="responsive-table">
                                                    <table class="table table-stripped table-dark site-table">
                                                        <thead>
                                                            <th>Amount</th>
                                                            <th>Time Left</th>
                                                            <th>Buy Rate</th>
                                                            <th>Current Rate</th>
                                                            <th>Action</th>
                                                        </thead>
                                                        <tbody>
                                                            @foreach (auth()->user()->activeTrades($coin->id) as $trade)
                                                                <tr>
                                                                    <td data-caption="{{ __('Amount') }}">
                                                                        {{ showAmount($trade->bid) }}</td>
                                                                    <td data-caption="Time Left">
                                                                        <p id="trade_count_{{ $loop->iteration }}"
                                                                            class="mb-2">
                                                                        </p>
                                                                        <script>
                                                                            getCountDown("trade_count_{{ $loop->iteration }}",
                                                                                "{{ now()->gt($trade->ends_at) ? 0 : now()->diffInSeconds($trade->ends_at) }}"
                                                                            )
                                                                        </script>

                                                                    </td>
                                                                    <td data-caption="Starting Rate">
                                                                        {{ $trade->starting_rate }}</td>
                                                                    <td data-caption="Closing Rate"><span
                                                                            id="coin_{{ $coin->id }}_rate">{{ $coin->current_price }}</span>
                                                                    </td>
                                                                    <td data-caption="Action">
                                                                        <a href="{{ route('user.trade.stop', $trade->id) }}"
                                                                            class="btn btn-danger">Stop</a>

                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @else
                                                <h5>No Active Trades</h5>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
@push('script')
    <script>
        'use strickt';

        $(".upCoin").click(function(e) {
            e.preventDefault();
            var coin = $(this).data('coin');

            var form = $("#trade-form" + coin.id);
            form.attr('action', $(this).data('href'));
            form.find('input[name=type]').val('up');

            if ((form.find(`input[name=trade_amount${coin.id}]`).val() || 0) < 1) {
                alert('Please Enter Valid Trade Amount');
                return;
            }

            if ((form.find(`input[name=trade_time${coin.id}]`).val() || 0) < 1) {
                alert('Please Enter Valid Trade Time');
                return;
            }

            form.submit();
        });

        $(".downCoin").click(function(e) {
            e.preventDefault();
            var coin = $(this).data('coin');

            var form = $("#trade-form" + coin.id);
            form.attr('action', $(this).data('href'));
            form.find('input[name=type]').val('down');

            if ((form.find(`input[name=trade_amount${coin.id}]`).val() || 0) < 1) {
                alert('Please Enter Valid Trade Amount');
                return;
            }

            if ((form.find(`input[name=trade_time${coin.id}]`).val() || 0) < 1) {
                alert('Please Enter Valid Trade Time');
                return;
            }

            form.submit();
        });

        // Increase value
        $(document).on('click', '.plus-time', function() {
            var inputField = $(this).siblings('input');
            var currentValue = parseInt(inputField.val()) || 0;
            inputField.val(currentValue + 1);
        });

        // Decrease value
        $(document).on('click', '.minus-time', function() {
            var inputField = $(this).siblings('input');
            var currentValue = parseInt(inputField.val()) || 0;

            // Make sure the value doesn't go below 0
            if (currentValue > 1) {
                inputField.val(currentValue - 1);
            }
        });

        // Increase value
        $(document).on('click', '.plus-bid', function() {
            var inputField = $(this).siblings('input');
            var currentValue = parseInt(inputField.val()) || 0;
            inputField.val(currentValue + 1);
        });

        // Decrease value
        $(document).on('click', '.minus-bid', function() {
            var inputField = $(this).siblings('input');
            var currentValue = parseInt(inputField.val()) || 0;

            // Make sure the value doesn't go below 0
            if (currentValue > 1) {
                inputField.val(currentValue - 1);
            }
        });
    </script>
@endpush
