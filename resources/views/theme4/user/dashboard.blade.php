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
                    // firePayment(elementId);
                    alert('trade_done');
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

        <div class="button-container">
            <button id="button1" onclick="showDiv(1)" class="active p-2">Exchange </button>

            <button id="button2" onclick="showDiv(2)" class="px-2"> Wallet </button>
        </div>

        <div id="div1" class="col-xl-4 col-lg-6 d-block ">
            <div class="row mb-4">
                <div class="col">
                    <div class="user-account-number h-100 bg-success">
                        <p class="caption mb-2"> {{ __('Exchange Balance') }}</p>
                        <h3 class="acc-number"> <i class="fa-solid fa-dollar"></i>
                            {{ number_format(auth()->user()->exchange_balance, 2) . ' ' . $general->site_currency }}
                        </h3>
                    </div>
                </div>
            </div>
            <!-- Your div1 content here -->
            <div class="row g-sm-4 g-3">
                <div class="col-lg-12 col-6">
                    <div class="d-box-three gr-bg-9">

                        <i class="fa-solid fa-arrow-up"></i>

                        <div class="content">
                            <p class="text-small mb-0 text-white">{{ __('Depost') }}</p>
                            <h5 class="title text-white">
                                {{ number_format($withdraw, 2) . ' ' . $general->site_currency }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-6">
                    <div class="d-box-three gr-bg-3">

                        <i class="fa-solid fa-arrow-down"></i>

                        <div class="content">
                            <p class="text-small mb-0 text-white">{{ __('Withdrawal') }}</p>
                            <h5 class="title text-white">
                                {{ number_format($totalDeposit, 2) . ' ' . $general->site_currency }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-6">
                    <div class="d-box-three gr-bg-1">

                        <i class="fab fa-bitcoin  text-white"></i>

                        <div class="content">
                            <p class="text-small mb-0 text-white">{{ __('BGT Coins') }}</p>
                            <h5 class="title text-white">
                                {{ $withdraw }} BGT</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-6">
                    <div class="d-box-three gr-bg-8">

                        <i class="fas fa-coins  text-white"></i>

                        <div class="content">
                            <p class="text-small mb-0 text-white">{{ __('RV Coins') }}</p>
                            <h5 class="title text-white">
                                {{ $totalDeposit }} RV</h5>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- mobile screen card start -->
            <div class="col-12 d-sm-none">
                <div class="row gy-4 mobile-box-wrapper">

                    <div class="col-3">
                        <div class="mobile-box link-item">
                            <a href="{{ route('user.investmentplan') }}" class="item-link"></a>
                            <i class="fa-solid fa-money-bill-trend-up"></i>
                            <h6 class="title">{{ __('Invest') }}</h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mobile-box link-item">
                            <a href="{{ route('user.deposit') }}" class="item-link"></a>
                            <i class="fa-solid fa-wallet"></i>
                            <h6 class="title">{{ __('Deposit') }}</h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mobile-box link-item">
                            <a href="{{ route('user.withdraw') }}" class="item-link"></a>
                            <i class="fa-solid fa-money-check-dollar"></i>
                            <h6 class="title">{{ __('Withdraw') }}</h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mobile-box link-item">
                            <a href="{{ route('user.interest.log') }}" class="item-link"></a>
                            <i class="fa-solid fa-money-bill-transfer"></i>
                            <h6 class="title">{{ __('Transfer') }}</h6>
                        </div>
                    </div>


                </div>
            </div>
            <!-- mobile screen card end -->


        </div>

        <div id="div2" class="col-xl-4 col-lg-6 d-block d-sm-none hidden">
            <!-- Your div2 content here -->
            <div class="col-xl-4 col-lg-6">
                <div class="user-account-number h-50 bg-success">


                    <p class="caption mb-2"> {{ __('Wallet Balance') }}</p>
                    <h3 class="acc-number"> <i class="fa-solid fa-dollar"></i>
                        {{ number_format(auth()->user()->balance, 2) . ' ' . $general->site_currency }}
                    </h3>

                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-6">
                    <div class="d-box-three gr-bg-1">
                        <i class="fa-solid fa-money-bill-1-wave"></i>
                        <div class="content">
                            <p class="text-small mb-0 text-white">{{ __('Daily Profit') }}</p>
                            <h5 class="title text-white">
                                {{ number_format($withdraw, 2) . ' ' . $general->site_currency }}
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-6">
                    <div class="d-box-three gr-bg-3">
                        <i class="fa-solid fa-money-bill-trend-up"></i>
                        <div class="content">
                            <p class="text-small mb-0 text-white">{{ __('1 Week Profit') }}</p>
                            <h5 class="title text-white">
                                {{ number_format($totalDeposit, 2) . ' ' . $general->site_currency }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-6">
                    <div class="d-box-three gr-bg-2">
                        <i class="fa-regular fa-credit-card"></i>
                        <div class="content">
                            <p class="text-small mb-0 text-white">{{ __('1 Month Profit') }}</p>
                            <h5 class="title text-white">
                                {{ number_format($totalInvest, 2) . ' ' . $general->site_currency }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-6">
                    <div class="d-box-three gr-bg-4">
                        <i class="fa-solid fa-money-check-dollar"></i>
                        <div class="content">
                            <p class="text-small mb-0 text-white">{{ __('2 Month Profit') }}</p>
                            <h5 class="title text-white">
                                {{ isset($currentInvest->amount) ? number_format($currentInvest->amount, 2) : 0 }}
                                {{ @$general->site_currency }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-12 d-sm-none">
                <div class="row gy-4 mobile-box-wrapper">
                    <div class="col-3">
                        <div class="mobile-box link-item">
                            <a href="{{ route('user.investmentplan') }}" class="item-link"></a>
                            <i class="fa-solid fa-money-bill-trend-up"></i>
                            <h6 class="title">{{ __('History') }}</h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mobile-box link-item">
                            <a href="{{ route('user.deposit') }}" class="item-link"></a>
                            <i class="fa-solid fa-wallet"></i>
                            <h6 class="title">{{ __('Deposit') }}</h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mobile-box link-item">
                            <a href="{{ route('user.withdraw') }}" class="item-link"></a>
                            <i class="fa-solid fa-money-check-dollar"></i>
                            <h6 class="title">{{ __('Withdraw') }}</h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mobile-box link-item">
                            <a href="{{ route('user.interest.log') }}" class="item-link"></a>
                            <i class="fa-solid fa-money-bill-transfer"></i>
                            <h6 class="title">{{ __('Transfer') }}</h6>
                        </div>
                    </div>

                    <div class="mt-4">
                        <label>{{ __('Your refferal code') }}</label>
                        <div class="input-group mb-3">
                            <input type="text" id="refer-link" class="form-control copy-text"
                                value="{{ @Auth::user()->username }}" placeholder="referallink.com/refer"
                                aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
                            <button type="button" class="input-group-text copy cmn-btn"
                                id="basic-addon2">{{ __('Copy') }}</button>
                        </div>
                    </div>


                    <div class="col-3">
                        <div class="mobile-box link-item">
                            <a href="{{ route('user.transaction.log') }}" class="item-link"></a>
                            <i class="fa-solid fa-money-bill-transfer"></i>
                            <h6 class="title">{{ __('2FA') }}</h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mobile-box link-item">
                            <a href="{{ route('user.transaction.log') }}" class="item-link"></a>
                            <i class="fa-solid fa-money-bill-transfer"></i>
                            <h6 class="title">{{ __('Support') }}</h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mobile-box link-item">
                            <a href="{{ route('user.commision') }}" class="item-link"></a>
                            <i class="fa-solid fa-money-bill-transfer"></i>
                            <h6 class="title">{{ __('Settings') }}</h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mobile-box link-item">
                            <a href="{{ route('user.viewall') }}" class="item-link"></a>
                            <i class="fa-solid fa-money-bill-transfer"></i>
                            <h6 class="title">{{ __('View All') }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile screen card end -->

        </div>


        <div class="row gy-4">
            <div class="row g-sm-4 g-3 justify-content-between">


                <!-- mobile card slider start -->
                <div class="col-12 d-sm-none d-block">
                    <div class="mobile-card-slider">
                        <div class="single-slide">
                            <div class="d-box-three gr-bg-1">
                                <i class="fa-solid fa-wallet"></i>
                                <div class="content">
                                    <p class="text-small mb-0 text-white">{{ __('Total Withdraw') }}</p>
                                    <h5 class="title text-white">
                                        {{ number_format($withdraw, 2) . ' ' . $general->site_currency }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="d-box-three gr-bg-3">
                                <i class="fa-solid fa-money-bill-transfer"></i>
                                <div class="content">
                                    <p class="text-small mb-0 text-white">{{ __('Total Deposit') }}</p>
                                    <h5 class="title text-white">
                                        {{ number_format($totalDeposit, 2) . ' ' . $general->site_currency }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="d-box-three gr-bg-2">
                                <i class="fa-solid fa-money-bill-trend-up"></i>
                                <div class="content">
                                    <p class="text-small mb-0 text-white">{{ __('Total Invest') }}</p>
                                    <h5 class="title text-white">
                                        {{ number_format($totalInvest, 2) . ' ' . $general->site_currency }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="d-box-three gr-bg-4">
                                <i class="fa-solid fa-money-bills"></i>
                                <div class="content">
                                    <p class="text-small mb-0 text-white">{{ __('Current Invest') }}</p>
                                    <h5 class="title text-white">
                                        {{ isset($currentInvest->amount) ? number_format($currentInvest->amount, 2) : 0 }}
                                        {{ @$general->site_currency }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="d-box-three gr-bg-5">
                                <i class="fa-regular fa-credit-card"></i>
                                <div class="content">
                                    <p class="text-small mb-0 text-white">{{ __('Pending Invest') }}</p>
                                    <h5 class="title text-white">
                                        {{ number_format($pendingInvest, 2) . ' ' . $general->site_currency }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="d-box-three gr-bg-6">
                                <i class="fa-solid fa-sack-dollar"></i>
                                <div class="content">
                                    <p class="text-small mb-0 text-white">{{ __('Pending Withdraw') }}</p>
                                    <h5 class="title text-white">
                                        {{ number_format($pendingWithdraw, 2) . ' ' . $general->site_currency }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="d-box-three gr-bg-7">
                                <i class="fa-solid fa-file-invoice-dollar"></i>
                                <div class="content">
                                    <p class="text-small mb-0 text-white">{{ __('Refferal Earn') }}</p>
                                    <h5 class="title text-white">{{ number_format($commison, 2) }}
                                        {{ @$general->site_currency }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- mobile card slider end -->


                <div class="col-xl-4 col-lg-6 d-sm-block d-none">
                    <div class="row g-sm-4 g-3">
                        <div class="col-lg-12 col-6">
                            <div class="d-box-three gr-bg-1">
                                <div class="icon">
                                    <i class="bi bi-piggy-bank text-white"></i>
                                </div>
                                <div class="content">
                                    <p class="text-small mb-0 text-white">{{ __('Total Withdraw') }}</p>
                                    <h5 class="title text-white">
                                        {{ number_format($withdraw, 2) . ' ' . $general->site_currency }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-6">
                            <div class="d-box-three gr-bg-3">
                                <div class="icon">
                                    <i class="bi bi-hourglass-split text-white"></i>
                                </div>
                                <div class="content">
                                    <p class="text-small mb-0 text-white">{{ __('Total Deposit') }}</p>
                                    <h5 class="title text-white">
                                        {{ number_format($totalDeposit, 2) . ' ' . $general->site_currency }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 d-sm-block d-none">
                    <div class="row g-sm-4 g-3">
                        <div class="col-xl-12 col-6">
                            <div class="d-box-three gr-bg-2">
                                <div class="icon">
                                    <i class="bi bi-cash-coin text-white"></i>
                                </div>
                                <div class="content">
                                    <p class="text-small mb-0 text-white">{{ __('Total Invest') }}</p>
                                    <h5 class="title text-white">
                                        {{ number_format($totalInvest, 2) . ' ' . $general->site_currency }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-6">
                            <div class="d-box-three gr-bg-4">
                                <div class="icon">
                                    <i class="bi bi-wallet2 text-white"></i>
                                </div>
                                <div class="content">
                                    <p class="text-small mb-0 text-white">{{ __('Current Invest') }}</p>
                                    <h5 class="title text-white">
                                        {{ isset($currentInvest->amount) ? number_format($currentInvest->amount, 2) : 0 }}
                                        {{ @$general->site_currency }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gy-4 mt-1 d-box-two-wrapper d-sm-flex d-none">
                <div class="col-xl-3 col-sm-6">
                    <div class="d-box-two">
                        <div class="d-box-two-icon">
                            <i class="fas fa-boxes"></i>
                        </div>
                        <span class="caption-title">{{ __('Current Plan') }}</span>
                        <h3 class="d-box-two-amount">
                            {{ isset($currentPlan->plan->plan_name) ? $currentPlan->plan->plan_name : 'N/A' }}</h3>
                        <a href="{{ route('user.invest.all') }}" class="link-btn"><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="d-box-two">
                        <div class="d-box-two-icon">
                            <i class="fas fa-money-check"></i>
                        </div>
                        <span class="caption-title">{{ __('Pending Invest') }}</span>
                        <h3 class="d-box-two-amount">
                            {{ number_format($pendingInvest, 2) . ' ' . $general->site_currency }}
                        </h3>
                        <a href="{{ route('user.invest.pending') }}" class="link-btn"><i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="d-box-two">
                        <div class="d-box-two-icon">
                            <i class="fas fa-hourglass-half"></i>
                        </div>
                        <span class="caption-title">{{ __('Pending Withdraw') }}</span>
                        <h3 class="d-box-two-amount">
                            {{ number_format($pendingWithdraw, 2) . ' ' . $general->site_currency }}
                        </h3>
                        <a href="{{ route('user.withdraw.pending') }}" class="link-btn"><i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="d-box-two">
                        <div class="d-box-two-icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <span class="caption-title">{{ __('Refferal Earn') }}</span>
                        <h3 class="d-box-two-amount">
                            {{ number_format($commison, 2) }} {{ @$general->site_currency }}
                        </h3>
                        <a href="{{ route('user.commision') }}" class="link-btn"><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <h4 class="mt-4">Bitcoin Gold Trading ( Coins )</h4>
            @foreach ($coins as $coin)
                <div class="row mb-4">
                    <div class="col-12">
                        @include('common.chart', ['coin' => $coin])
                    </div>
                    <div class="col-12 text-center">
                        <form id="trade-form{{ $coin->id }}"
                            class="d-flex flex-column align-items-center justify-content-center">
                            @csrf
                            <input type="hidden" name="type">
                            <div class="form-group w-50">
                                <div class="input-group">
                                    <span class="input-group-text minus-bid" data-coin-id="{{ $coin->id }}"><i
                                            class="fa fa-minus"></i></span>
                                    <input required class="form-control" name="trade_amount{{ $coin->id }}"
                                        placeholder="Amount" type="text">
                                    <span class="input-group-text plus-bid" data-coin-id="{{ $coin->id }}"><i
                                            class="fa fa-plus"></i></span>
                                </div>
                            </div>
                            <div class="form-group   w-50">
                                <div class="input-group">
                                    <span class="input-group-text minus-time" data-coin-id="{{ $coin->id }}"><i
                                            class="fa fa-minus"></i></span>
                                    <input required class="form-control" name="trade_time{{ $coin->id }}"
                                        placeholder="Minutes" type="text">
                                    <span class="input-group-text plus-time" data-coin-id="{{ $coin->id }}"><i
                                            class="fa fa-plus"></i></span>
                                </div>
                            </div>

                            <div class="button-row ">
                                <button class="btn gr-bg-3  text-white btn-sm upCoin"
                                    data-href="{{ route('user.coin.buy', $coin->id) }}"
                                    data-coin="{{ json_encode($coin) }}" type="button" href="#">
                                    <i class="fa-solid fa-arrow-up"></i>

                                </button>
                                <button class="btn gr-bg-8 text-white btn-sm downCoin"
                                    data-href="{{ route('user.coin.buy', $coin->id) }}"
                                    data-coin="{{ json_encode($coin) }}" type="button" href="#">
                                    <i class="fa-solid fa-arrow-down"></i>
                                </button>
                            </div>
                        </form>

                        <div class="row mt-4">
                            <div class="col-12">
                                @if (count(auth()->user()->trades($coin->id)) > 0)
                                    <div class="responsive-table">
                                        <table class="table table-stripped table-dark site-table">
                                            <thead>
                                                <th>Amount</th>
                                                <th>Time Left</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                @foreach (auth()->user()->trades($coin->id) as $trade)
                                                    <tr>
                                                        <td data-caption="{{ __('Amount') }}">
                                                            {{ showAmount($trade->bid) }}</td>
                                                        <td data-caption="Time Left">
                                                            <p id="trade_count_{{ $loop->iteration }}" class="mb-2">
                                                            </p>
                                                            <script>
                                                                getCountDown("trade_count_{{ $loop->iteration }}",
                                                                    "{{ now()->gt($trade->ends_at) ? 0 : now()->diffInSeconds($trade->ends_at) }}"
                                                                )
                                                            </script>

                                                        </td>
                                                        <td data-caption="Action">
                                                            <a href="" class="btn btn-danger">Stop</a>

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
            @endforeach


            <table class="table table-bordered table-striped mt-3">
                <thead class="gr-bg-1 text-white">
                    <tr>
                        <th>Name</th>
                        <th>Last Price</th>
                        <th>Current Price</th>
                        <th>Change</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coins as $coin)
                        <tr class="gr-bg-{{ $loop->index + 5 }} text-white">
                            <td class=" text-white"><i
                                    class="{{ $loop->first ? 'fab fa-bitcoin' : 'fas fa-coins' }}   text-white"></i>
                                BGT
                            </td>
                            <td class=" text-white">{{ showAmount($coin->latest_price->prev_price) }}</td>
                            <td class=" text-white">{{ showAmount($coin->latest_price->current_price) }}</td>
                            <td class=" {{ $coin->change > 0 ? 'text-success' : 'text-warning' }} ">
                                {{ $coin->change }}%
                                @if ($coin->change > 0)
                                    <i class="fa-solid fa-arrow-up"></i>
                                @else
                                    <i class="fa-solid fa-arrow-down"></i>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>


            @php
                $reference = auth()->user()->refferals;
            @endphp

            @php
                $reference = auth()->user()->refferals;
            @endphp
        </div>
        <br>
        <!-- TradingView Widget BEGIN -->
        <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <div class="tradingview-widget-copyright">
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js"
                    async>
                    {
                        "colorTheme": "dark",
                        "dateRange": "12M",
                        "showChart": true,
                        "locale": "en",
                        "largeChartUrl": "https://trade.bitcoingoldtrading.com/dashboard",
                        "isTransparent": false,
                        "showSymbolLogo": true,
                        "showFloatingTooltip": false,
                        "width": "100%",
                        "height": "660",
                        "plotLineColorGrowing": "rgba(0, 255, 0, 1)",
                        "plotLineColorFalling": "rgba(255, 0, 0, 1)",
                        "gridLineColor": "rgba(255, 0, 0, 0)",
                        "scaleFontColor": "rgba(106, 109, 120, 1)",
                        "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
                        "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
                        "belowLineFillColorGrowingBottom": "rgba(41, 98, 255, 0)",
                        "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",
                        "symbolActiveColor": "rgba(41, 98, 255, 0.12)",
                        "tabs": [{
                            "title": "Indices",
                            "symbols": [{
                                    "s": "BITSTAMP:BTCUSD"
                                },
                                {
                                    "s": "BITSTAMP:ETHUSD"
                                },
                                {
                                    "s": "BINANCE:XRPUSDT"
                                },
                                {
                                    "s": "BINANCE:SOLUSDT"
                                },
                                {
                                    "s": "BINANCE:MATICUSDT"
                                },
                                {
                                    "s": "BINANCE:FTMUSDT"
                                },
                                {
                                    "s": "BINANCE:SHIBUSDT"
                                },
                                {
                                    "s": "BINANCE:INJUSDT"
                                },
                                {
                                    "s": "BINANCE:DOGEUSDT"
                                },
                                {
                                    "s": "BINANCE:GALAUSDT"
                                },
                                {
                                    "s": "BINANCE:ARBUSDT"
                                },
                                {
                                    "s": "BINANCE:NEARUSDT"
                                },
                                {
                                    "s": "BINANCE:LTCUSDT"
                                },
                                {
                                    "s": "BINANCE:ALGOUSDT"
                                },
                                {
                                    "s": "BINANCE:RUNEUSDT"
                                },
                                {
                                    "s": "BINANCE:FETUSDT"
                                },
                                {
                                    "s": "BINANCE:APTUSDT"
                                },
                                {
                                    "s": "BINANCE:GRTUSDT"
                                },
                                {
                                    "s": "BINANCE:APEUSDT"
                                },
                                {
                                    "s": "BINANCE:SUIUSDT"
                                },
                                {
                                    "s": "BINANCE:UNIUSDT"
                                }
                            ],
                            "originalTitle": "Indices"
                        }]
                    }
                </script>
            </div>
            <!-- TradingView Widget END -->
            <div class="row">
                <div class="col-md-12">
                    <div class="site-card">
                        <div class="card-header">
                            <h5 class="mb-0">{{ __('Your Refferal') }}</h5>
                        </div>
                        <div class="card-body">
                            @if ($reference->count() > 0)
                                <ul class="sp-referral">
                                    <li class="single-child root-child">
                                        <p>
                                            <img src="{{ getFile('user', auth()->user()->image) }}">
                                            <span
                                                class="mb-0">{{ auth()->user()->full_name . ' - ' . currentPlan(auth()->user()) }}</span>
                                        </p>
                                        <ul class="sub-child-list step-2">
                                            @foreach ($reference as $user)
                                                <li class="single-child">
                                                    <p>
                                                        <img src="{{ getFile('user', $user->image) }}">
                                                        <span
                                                            class="mb-0">{{ $user->full_name . ' - ' . currentPlan($user) }}</span>
                                                    </p>

                                                    <ul class="sub-child-list step-3">
                                                        @foreach ($user->refferals as $ref)
                                                            <li class="single-child">
                                                                <p>
                                                                    <img src="{{ getFile('user', $ref->image) }}">
                                                                    <span
                                                                        class="mb-0">{{ $ref->full_name . ' - ' . currentPlan($ref) }}</span>
                                                                </p>

                                                                <ul class="sub-child-list step-4">
                                                                    @foreach ($ref->refferals as $ref2)
                                                                        <li class="single-child">
                                                                            <p>
                                                                                <img
                                                                                    src="{{ getFile('user', $ref2->image) }}">
                                                                                <span
                                                                                    class="mb-0">{{ $ref2->full_name . ' - ' . currentPlan($ref2) }}</span>
                                                                            </p>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>

                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </li>
                                </ul>
                            @else
                                <div class="col-md-12 text-center mt-5">
                                    <i class="fa-solid fa-x"></i>
                                    <p class="mt-2">
                                        {{ __('No User Found') }}
                                    </p>

                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="planDelete" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <form action="" method="post">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Plan</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @foreach (auth()->user()->payments()->where('payment_status', 1)->get() as $pay)
                                    <div class="form-group site-radio">

                                        <input type="radio" name="plan" value="{{ $pay->plan->id }}"
                                            id="planDeletelabel-{{ $loop->iteration }}">

                                        <label for="planDeletelabel-{{ $loop->iteration }}">
                                            {{ $pay->plan->plan_name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Delete</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>


@endsection

@push('style')
    <style>
        .modal-backdrop.fade.show {
            display: none;
        }

        @media (max-width: 991px) {
            #header.header-inner-pages {
                display: block;
                background: transparent !important;
                position: absolute;
            }

            .dashboard-body-part {
                padding-top: 80px;
            }
        }

        .sp-referral .single-child {
            padding: 6px 10px;
            border-radius: 5px;
        }

        .sp-referral .single-child+.single-child {
            margin-top: 15px;
        }

        .sp-referral .single-child p {
            display: flex;
            align-items: center;
            margin-bottom: 0;
        }

        .sp-referral .single-child p img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
            -o-object-fit: cover;
        }

        .sp-referral .single-child p span {
            width: calc(100% - 35px);
            font-size: 14px;
            padding-left: 10px;
        }

        .sp-referral>.single-child.root-child>p img {
            border: 2px solid #c3c3c3;
        }

        .sub-child-list {
            position: relative;
            padding-left: 35px;
        }

        .sub-child-list::before {
            position: absolute;
            content: '';
            top: 0;
            left: 17px;
            width: 1px;
            height: 100%;
            background-color: #a1a1a1;
        }

        .sub-child-list>.single-child {
            position: relative;
        }

        .sub-child-list>.single-child::before {
            position: absolute;
            content: '';
            left: -18px;
            top: 21px;
            width: 30px;
            height: 5px;
            border-left: 1px solid #a1a1a1;
            border-bottom: 1px solid #a1a1a1;
            border-radius: 0 0 0 5px;
        }

        .sub-child-list>.single-child>p img {
            border: 2px solid #c3c3c3;
        }

        .hidden {
            display: none !important;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin: 5px;
        }

        .button-container button {
            padding: 3px 5px;
            border: 2px solid #fff;
            background-color: transparent;
            color: #fff;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .button-container button.active {
            background-color: #fff;
            color: #000;
            border-radius: 25px;
        }

        .button-container button:not(:last-child) {
            margin-right: 10px;
        }
    </style>
@endpush

@push('script')
    <script>
        'use strict';

        $('.planDelete').on('click', function() {
            const modal = $('#planDelete');

            modal.find('form').attr('action', $(this).data('href'))

            modal.modal('show')


        })



        // $(".buyCoin").click(function(e) {
        //     e.preventDefault();
        //     var modal = $("#tradeCoinModal");
        //     var coin = $(this).data("coin");
        //     var className = "current_" + coin.name + "_rate";
        //     $("#coin_rate").addClass(className);

        //     $("." + className).html("Current " + coin.name + " rate: " + eval("current_" +
        //         coin.name + "_rate"));

        //     modal.find('.modal-title').html("Trade " + coin.name);
        //     modal.find('.submit').text("Buy Now")
        //     modal.find('form').attr("action", $(this).data('href'));
        //     modal.modal('show');
        // });

        // $(".sellCoin").click(function(e) {
        //     e.preventDefault();
        //     var modal = $("#tradeCoinModal");
        //     var coin = $(this).data("coin");
        //     var className = "current_" + coin.name + "_rate";
        //     $("#coin_rate").addClass(className);

        //     $("." + className).html("Current " + coin.name + " rate: " + eval("current_" +
        //         coin.name + "_rate"));

        //     modal.find('.modal-title').html("Trade " + coin.name);
        //     modal.find('.submit').text("Sell Now")
        //     modal.find('form').attr("action", $(this).data('href'));
        //     modal.modal('show');
        // });

        // $("#tradeCoinModal").on("hidden.bs.modal", function() {
        //     $("#coin_rate").removeAttr("class");
        //     $("#tradeCoinModal").find('.modal-title').html("");
        // });

        var copyButton = document.querySelector('.copy');
        var copyInput = document.querySelector('.copy-text');
        copyButton.addEventListener('click', function(e) {
            e.preventDefault();
            var text = copyInput.select();
            document.execCommand('copy');
        });
        copyInput.addEventListener('click', function() {
            this.select();
        });


        $('.mobile-card-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '60px',
            arrows: false,
            dots: false,
            autoplay: false,
            cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1.000)',
            speed: 1500,
            autoplaySpeed: 1000,
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });

        function showDiv(divNumber) {
            document.getElementById('button1').classList.remove('active');
            document.getElementById('button2').classList.remove('active');

            if (divNumber === 1) {
                document.getElementById('button1').classList.add('active');
                // Add logic to show Div 1
            } else {
                document.getElementById('button2').classList.add('active');
                // Add logic to show Div 2
            }
            if (divNumber === 1) {
                document.getElementById('div1').classList.remove('hidden');
                document.getElementById('div2').classList.add('hidden');
            } else {
                document.getElementById('div1').classList.add('hidden');
                document.getElementById('div2').classList.remove('hidden');
            }
        }
    </script>
@endpush
