<?php $__env->startSection('content2'); ?>
    <div class="dashboard-body-part">
        
        <div class="button-container">
        <button id="button1" onclick="showDiv(1)" class="active">Exchange </button>
       
<button id="button2" onclick="showDiv(2)"> Wallet </button>
</div>

      <div id="div1" class="col-xl-4 col-lg-6 d-block d-sm-nonee">
          <div class="col-xl-4 col-lg-6">
                    <div class="user-account-number h-50 bg-success">
                   
                        
                        <p class="caption mb-2"> <?php echo e(__('Exchange Balance')); ?></p>
                        <h3 class="acc-number"> <i class="fa-solid fa-dollar"></i>
                            <?php echo e(number_format(auth()->user()->balance, 2) . ' ' . $general->site_currency); ?>

                        </h3>
                        
                    </div>
                </div>
                <br>
    <!-- Your div1 content here -->  <div class="row g-sm-4 g-3">
                        <div class="col-lg-12 col-6">
                            <div class="d-box-three gr-bg-9">
                                
                                    <i class="fa-solid fa-arrow-up"></i>
                               
                                <div class="content">
                                    <p class="text-small mb-0 text-white"><?php echo e(__('Depost')); ?></p>
                                    <h5 class="title text-white">
                                        <?php echo e(number_format($withdraw, 2) . ' ' . $general->site_currency); ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-6">
                            <div class="d-box-three gr-bg-8">
                                
                                    <i class="fa-solid fa-arrow-down"></i>
                                
                                <div class="content">
                                    <p class="text-small mb-0 text-white"><?php echo e(__('Withdrawal')); ?></p>
                                    <h5 class="title text-white">
                                        <?php echo e(number_format($totalDeposit, 2) . ' ' . $general->site_currency); ?></h5>
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
                            <a href="<?php echo e(route('user.investmentplan')); ?>" class="item-link"></a>
                          <i class="fa-solid fa-money-bill-trend-up"></i>
                            <h6 class="title"><?php echo e(__('Invest')); ?></h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mobile-box link-item">
                            <a href="<?php echo e(route('user.deposit')); ?>" class="item-link"></a>
                            <i class="fa-solid fa-wallet"></i>
                            <h6 class="title"><?php echo e(__('Deposit')); ?></h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mobile-box link-item">
                            <a href="<?php echo e(route('user.withdraw')); ?>" class="item-link"></a>
                            <i class="fa-solid fa-money-check-dollar"></i>
                            <h6 class="title"><?php echo e(__('Withdraw')); ?></h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mobile-box link-item">
                            <a href="<?php echo e(route('user.interest.log')); ?>" class="item-link"></a>
                        <i class="fa-solid fa-money-bill-transfer"></i>
                            <h6 class="title"><?php echo e(__('Transfer')); ?></h6>
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
                   
                        
                        <p class="caption mb-2"> <?php echo e(__('Wallet Balance')); ?></p>
                        <h3 class="acc-number"> <i class="fa-solid fa-dollar"></i>
                            <?php echo e(number_format(auth()->user()->balance, 2) . ' ' . $general->site_currency); ?>

                        </h3>
                        
                    </div>
                </div>
                <br>
       <div class="row">
    <div class="col-lg-12 col-6">
        <div class="d-box-three gr-bg-1">
            <i class="fa-solid fa-money-bill-1-wave"></i>
            <div class="content">
                <p class="text-small mb-0 text-white"><?php echo e(__('Daily Profit')); ?></p>
                <h5 class="title text-white"><?php echo e(number_format($withdraw, 2) . ' ' . $general->site_currency); ?></h5>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-6">
        <div class="d-box-three gr-bg-3">
           <i class="fa-solid fa-money-bill-trend-up"></i>
            <div class="content">
                <p class="text-small mb-0 text-white"><?php echo e(__('1 Week Profit')); ?></p>
                <h5 class="title text-white"><?php echo e(number_format($totalDeposit, 2) . ' ' . $general->site_currency); ?></h5>
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
                <p class="text-small mb-0 text-white"><?php echo e(__('1 Month Profit')); ?></p>
                <h5 class="title text-white"><?php echo e(number_format($totalInvest, 2) . ' ' . $general->site_currency); ?></h5>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-6">
        <div class="d-box-three gr-bg-4">
           <i class="fa-solid fa-money-check-dollar"></i>
            <div class="content">
                <p class="text-small mb-0 text-white"><?php echo e(__('2 Month Profit')); ?></p>
                <h5 class="title text-white"><?php echo e(isset($currentInvest->amount) ? number_format($currentInvest->amount, 2) : 0); ?> <?php echo e(@$general->site_currency); ?></h5>
            </div>
        </div>
    </div>
</div>
<br>
  <div class="col-12 d-sm-none">
                <div class="row gy-4 mobile-box-wrapper">
                    <div class="col-3">
                        <div class="mobile-box link-item">
                            <a href="<?php echo e(route('user.investmentplan')); ?>" class="item-link"></a>
                          <i class="fa-solid fa-money-bill-trend-up"></i>
                            <h6 class="title"><?php echo e(__('History')); ?></h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mobile-box link-item">
                            <a href="<?php echo e(route('user.deposit')); ?>" class="item-link"></a>
                            <i class="fa-solid fa-wallet"></i>
                            <h6 class="title"><?php echo e(__('Deposit')); ?></h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mobile-box link-item">
                            <a href="<?php echo e(route('user.withdraw')); ?>" class="item-link"></a>
                            <i class="fa-solid fa-money-check-dollar"></i>
                            <h6 class="title"><?php echo e(__('Withdraw')); ?></h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mobile-box link-item">
                            <a href="<?php echo e(route('user.interest.log')); ?>" class="item-link"></a>
                        <i class="fa-solid fa-money-bill-transfer"></i>
                            <h6 class="title"><?php echo e(__('Transfer')); ?></h6>
                        </div>
                    </div>
                    
            <div class="mt-4">
                <label><?php echo e(__('Your refferal code')); ?></label>
                <div class="input-group mb-3">
                    <input type="text" id="refer-link" class="form-control copy-text"
                        value="<?php echo e((@Auth::user()->username)); ?>" placeholder="referallink.com/refer"
                        aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
                    <button type="button" class="input-group-text copy cmn-btn"
                        id="basic-addon2"><?php echo e(__('Copy')); ?></button>
                </div>
            </div>

                    
                    <div class="col-3">
                        <div class="mobile-box link-item">
                            <a href="<?php echo e(route('user.transaction.log')); ?>" class="item-link"></a>
                        <i class="fa-solid fa-money-bill-transfer"></i>
                            <h6 class="title"><?php echo e(__('2FA')); ?></h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mobile-box link-item">
                            <a href="<?php echo e(route('user.transaction.log')); ?>" class="item-link"></a>
                            <i class="fa-solid fa-money-bill-transfer"></i>
                            <h6 class="title"><?php echo e(__('Support')); ?></h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mobile-box link-item">
                            <a href="<?php echo e(route('user.commision')); ?>" class="item-link"></a>
                              <i class="fa-solid fa-money-bill-transfer"></i>
                            <h6 class="title"><?php echo e(__('Settings')); ?></h6>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mobile-box link-item">
                            <a href="<?php echo e(route('user.viewall')); ?>" class="item-link"></a>
                            <i class="fa-solid fa-money-bill-transfer"></i>
                            <h6 class="title"><?php echo e(__('View All')); ?></h6>
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
                                    <p class="text-small mb-0 text-white"><?php echo e(__('Total Withdraw')); ?></p>
                                    <h5 class="title text-white"><?php echo e(number_format($withdraw, 2) . ' ' . $general->site_currency); ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="d-box-three gr-bg-3">
                               <i class="fa-solid fa-money-bill-transfer"></i>
                                <div class="content">
                                    <p class="text-small mb-0 text-white"><?php echo e(__('Total Deposit')); ?></p>
                                    <h5 class="title text-white"><?php echo e(number_format($totalDeposit, 2) . ' ' . $general->site_currency); ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="d-box-three gr-bg-2">
                                <i class="fa-solid fa-money-bill-trend-up"></i>
                                <div class="content">
                                    <p class="text-small mb-0 text-white"><?php echo e(__('Total Invest')); ?></p>
                                    <h5 class="title text-white"><?php echo e(number_format($totalInvest, 2) . ' ' . $general->site_currency); ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="d-box-three gr-bg-4">
                                <i class="fa-solid fa-money-bills"></i>
                                <div class="content">
                                    <p class="text-small mb-0 text-white"><?php echo e(__('Current Invest')); ?></p>
                                    <h5 class="title text-white"><?php echo e(isset($currentInvest->amount) ? number_format($currentInvest->amount, 2) : 0); ?> <?php echo e(@$general->site_currency); ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="d-box-three gr-bg-5">
                              <i class="fa-regular fa-credit-card"></i>
                                <div class="content">
                                    <p class="text-small mb-0 text-white"><?php echo e(__('Pending Invest')); ?></p>
                                    <h5 class="title text-white"><?php echo e(number_format($pendingInvest, 2) . ' ' . $general->site_currency); ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="d-box-three gr-bg-6">
                          <i class="fa-solid fa-sack-dollar"></i>
                                <div class="content">
                                    <p class="text-small mb-0 text-white"><?php echo e(__('Pending Withdraw')); ?></p>
                                    <h5 class="title text-white"><?php echo e(number_format($pendingWithdraw, 2) . ' ' . $general->site_currency); ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="single-slide">
                            <div class="d-box-three gr-bg-7">
                               <i class="fa-solid fa-file-invoice-dollar"></i>
                                <div class="content">
                                    <p class="text-small mb-0 text-white"><?php echo e(__('Refferal Earn')); ?></p>
                                    <h5 class="title text-white"><?php echo e(number_format($commison, 2)); ?> <?php echo e(@$general->site_currency); ?></h5>
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
                                    <p class="text-small mb-0 text-white"><?php echo e(__('Total Withdraw')); ?></p>
                                    <h5 class="title text-white">
                                        <?php echo e(number_format($withdraw, 2) . ' ' . $general->site_currency); ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-6">
                            <div class="d-box-three gr-bg-3">
                                <div class="icon">
                                    <i class="bi bi-hourglass-split text-white"></i>
                                </div>
                                <div class="content">
                                    <p class="text-small mb-0 text-white"><?php echo e(__('Total Deposit')); ?></p>
                                    <h5 class="title text-white">
                                        <?php echo e(number_format($totalDeposit, 2) . ' ' . $general->site_currency); ?></h5>
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
                                    <p class="text-small mb-0 text-white"><?php echo e(__('Total Invest')); ?></p>
                                    <h5 class="title text-white">
                                        <?php echo e(number_format($totalInvest, 2) . ' ' . $general->site_currency); ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-6">
                            <div class="d-box-three gr-bg-4">
                                <div class="icon">
                                    <i class="bi bi-wallet2 text-white"></i>
                                </div>
                                <div class="content">
                                    <p class="text-small mb-0 text-white"><?php echo e(__('Current Invest')); ?></p>
                                    <h5 class="title text-white">
                                        <?php echo e(isset($currentInvest->amount) ? number_format($currentInvest->amount, 2) : 0); ?>

                                        <?php echo e(@$general->site_currency); ?></h5>
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
                        <span class="caption-title"><?php echo e(__('Current Plan')); ?></span>
                        <h3 class="d-box-two-amount">
                            <?php echo e(isset($currentPlan->plan->plan_name) ? $currentPlan->plan->plan_name : 'N/A'); ?></h3>
                        <a href="<?php echo e(route('user.invest.all')); ?>" class="link-btn"><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="d-box-two">
                        <div class="d-box-two-icon">
                            <i class="fas fa-money-check"></i>
                        </div>
                        <span class="caption-title"><?php echo e(__('Pending Invest')); ?></span>
                        <h3 class="d-box-two-amount">
                            <?php echo e(number_format($pendingInvest, 2) . ' ' . $general->site_currency); ?>

                        </h3>
                        <a href="<?php echo e(route('user.invest.pending')); ?>" class="link-btn"><i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="d-box-two">
                        <div class="d-box-two-icon">
                            <i class="fas fa-hourglass-half"></i>
                        </div>
                        <span class="caption-title"><?php echo e(__('Pending Withdraw')); ?></span>
                        <h3 class="d-box-two-amount">
                            <?php echo e(number_format($pendingWithdraw, 2) . ' ' . $general->site_currency); ?>

                        </h3>
                        <a href="<?php echo e(route('user.withdraw.pending')); ?>" class="link-btn"><i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="d-box-two">
                        <div class="d-box-two-icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <span class="caption-title"><?php echo e(__('Refferal Earn')); ?></span>
                        <h3 class="d-box-two-amount">
                            <?php echo e(number_format($commison, 2)); ?> <?php echo e(@$general->site_currency); ?>

                        </h3>
                        <a href="<?php echo e(route('user.commision')); ?>" class="link-btn"><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
<h4 class="mt-4">Bitcoin Gold Trading ( Coins )</h4>

    <table class="table table-bordered table-striped mt-3">
        <thead class="gr-bg-3 text-white">
            <tr>
                <th>Name</th>
                <th>Last Price</th>
                <th>Change</th>
            </tr>
        </thead>
        <tbody>
        
            <tr class="gr-bg-8 text-white">
                <td class=" text-white"><i class="fab fa-bitcoin  text-white"></i> BGT</td>
                <td class=" text-white">0.6</td>
                <td class=" text-white">-0.05%</td>
            </tr>
            <tr class="gr-bg-4 text-white">
                <td> <i class="fas fa-coins  text-white"></i> RV</td>
                <td>0.6</td>
                <td>+0.07%</td>
            </tr>
        </tbody>
    </table>
           

            <?php
                $reference = auth()->user()->refferals;
            ?>

            <?php
                $reference = auth()->user()->refferals;
            ?>
        </div>
<br>
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright">
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
  {
  "colorTheme": "light",
  "dateRange": "12M",
  "showChart": true,
  "locale": "en",
  "largeChartUrl": "https://trade.bitcoingoldtrading.com/dashboard",
  "isTransparent": false,
  "showSymbolLogo": true,
  "showFloatingTooltip": false,
  "width": "400",
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
  "tabs": [
    {
      "title": "Indices",
      "symbols": [
        {
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
    }
  ]
}
  </script>
</div>
<!-- TradingView Widget END -->
        <div class="row">
            <div class="col-md-12">
                <div class="site-card">
                    <div class="card-header">
                        <h5 class="mb-0"><?php echo e(__('Your Refferal')); ?></h5>
                    </div>
                    <div class="card-body">
                        <?php if($reference->count() > 0): ?>
                            <ul class="sp-referral">
                                <li class="single-child root-child">
                                    <p>
                                        <img src="<?php echo e(getFile('user', auth()->user()->image)); ?>">
                                        <span
                                            class="mb-0"><?php echo e(auth()->user()->full_name . ' - ' . currentPlan(auth()->user())); ?></span>
                                    </p>
                                    <ul class="sub-child-list step-2">
                                        <?php $__currentLoopData = $reference; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="single-child">
                                                <p>
                                                    <img src="<?php echo e(getFile('user', $user->image)); ?>">
                                                    <span
                                                        class="mb-0"><?php echo e($user->full_name . ' - ' . currentPlan($user)); ?></span>
                                                </p>

                                                <ul class="sub-child-list step-3">
                                                    <?php $__currentLoopData = $user->refferals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="single-child">
                                                            <p>
                                                                <img src="<?php echo e(getFile('user', $ref->image)); ?>">
                                                                <span
                                                                    class="mb-0"><?php echo e($ref->full_name . ' - ' . currentPlan($ref)); ?></span>
                                                            </p>

                                                            <ul class="sub-child-list step-4">
                                                                <?php $__currentLoopData = $ref->refferals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li class="single-child">
                                                                        <p>
                                                                            <img
                                                                                src="<?php echo e(getFile('user', $ref2->image)); ?>">
                                                                            <span
                                                                                class="mb-0"><?php echo e($ref2->full_name . ' - ' . currentPlan($ref2)); ?></span>
                                                                        </p>
                                                                    </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>

                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>
                                </li>
                            </ul>
                        <?php else: ?>
                            <div class="col-md-12 text-center mt-5">
                            <i class="fa-solid fa-x"></i>
                                <p class="mt-2">
                                    <?php echo e(__('No User Found')); ?>

                                </p>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="planDelete" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <form action="" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Plan</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php $__currentLoopData = auth()->user()->payments()->where('payment_status', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-group site-radio">

                                    <input type="radio" name="plan" value="<?php echo e($pay->plan->id); ?>"
                                        id="planDeletelabel-<?php echo e($loop->iteration); ?>">

                                    <label for="planDeletelabel-<?php echo e($loop->iteration); ?>">
                                        <?php echo e($pay->plan->plan_name); ?>

                                    </label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Delete</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    <?php $__env->stopSection(); ?>

    <?php $__env->startPush('style'); ?>
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
            display: none!important;
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
    <?php $__env->stopPush(); ?>

    <?php $__env->startPush('script'); ?>
        <script>
            'use strict';

            $('.planDelete').on('click', function() {
                const modal = $('#planDelete');

                modal.find('form').attr('action', $(this).data('href'))

                modal.modal('show')


            })

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
            responsive: [
                {
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
    <?php $__env->stopPush(); ?>

<?php echo $__env->make(template() . 'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u272239730/domains/bitcoingoldtrading.com/public_html/trade/core/resources/views/theme4/user/dashboard.blade.php ENDPATH**/ ?>