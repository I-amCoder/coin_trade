


<?php $__env->startSection('content2'); ?>
<div class="dashboard-body-part">
  <div class="mobile-page-header">
      <h5 class="title"><?php echo e(__('View All')); ?></h5>
      <a href="<?php echo e(route('user.dashboard')); ?>" class="back-btn"><i class="bi bi-arrow-left"></i> <?php echo e(__('Back')); ?></a>
  </div>
  <!-- mobile screen card start -->
  <div class="col-12 d-sm-none">
    <div class="row gy-4 mobile-box-wrapper">
        <div class="col-3">
            <div class="mobile-box link-item">
                <a href="<?php echo e(route('user.investmentplan')); ?>" class="item-link"></a>
                <img src="<?php echo e(asset('asset/theme4/images/d-icon/1.png')); ?>" alt="icon">
                <h6 class="title"><?php echo e(__('Invest')); ?></h6>
            </div>
        </div>
        <div class="col-3">
            <div class="mobile-box link-item">
                <a href="<?php echo e(route('user.deposit')); ?>" class="item-link"></a>
                <img src="<?php echo e(asset('asset/theme4/images/d-icon/2.png')); ?>" alt="icon">
                <h6 class="title"><?php echo e(__('Deposit')); ?></h6>
            </div>
        </div>
        <div class="col-3">
            <div class="mobile-box link-item">
                <a href="<?php echo e(route('user.withdraw')); ?>" class="item-link"></a>
                <img src="<?php echo e(asset('asset/theme4/images/d-icon/3.png')); ?>" alt="icon">
                <h6 class="title"><?php echo e(__('Withdraw')); ?></h6>
            </div>
        </div>
        <div class="col-3">
            <div class="mobile-box link-item">
                <a href="<?php echo e(route('user.transfer_money')); ?>" class="item-link"></a>
                <img src="<?php echo e(asset('asset/theme4/images/d-icon/4.png')); ?>" alt="icon">
                <h6 class="title"><?php echo e(__('Transfer')); ?></h6>
            </div>
        </div>
        <div class="col-3">
            <div class="mobile-box link-item">
                <a href="<?php echo e(route('user.2fa')); ?>" class="item-link"></a>
                <img src="<?php echo e(asset('asset/theme4/images/d-icon/5.png')); ?>" alt="icon">
                <h6 class="title"><?php echo e(__('2FA')); ?></h6>
            </div>
        </div>
        <div class="col-3">
            <div class="mobile-box link-item">
                <a href="<?php echo e(route('user.ticket.index')); ?>" class="item-link"></a>
                <img src="<?php echo e(asset('asset/theme4/images/d-icon/6.png')); ?>" alt="icon">
                <h6 class="title"><?php echo e(__('Support')); ?></h6>
            </div>
        </div>
        <div class="col-3">
            <div class="mobile-box link-item">
                <a href="<?php echo e(route('user.profile')); ?>" class="item-link"></a>
                <img src="<?php echo e(asset('asset/theme4/images/d-icon/7.png')); ?>" alt="icon">
                <h6 class="title"><?php echo e(__('Settings')); ?></h6>
            </div>
        </div>
    </div>

    <h5 class="mt-5 mb-4"><?php echo e(__('All Logs')); ?></h5>
    <div class="row gy-4 mobile-box-wrapper">
        <div class="col-3">
            <div class="mobile-box link-item">
                <a href="<?php echo e(route('user.invest.log')); ?>" class="item-link"></a>
                <img src="<?php echo e(asset('asset/theme4/images/d-icon/1.png')); ?>" alt="icon">
                <h6 class="title"><?php echo e(__('Invest Log')); ?></h6>
            </div>
        </div>
        <div class="col-3">
            <div class="mobile-box link-item">
                <a href="<?php echo e(route('user.deposit.log')); ?>" class="item-link"></a>
                <img src="<?php echo e(asset('asset/theme4/images/d-icon/2.png')); ?>" alt="icon">
                <h6 class="title"><?php echo e(__('Deposit Log')); ?></h6>
            </div>
        </div>
        <div class="col-3">
            <div class="mobile-box link-item">
                <a href="<?php echo e(route('user.withdraw.all')); ?>" class="item-link"></a>
                <img src="<?php echo e(asset('asset/theme4/images/d-icon/3.png')); ?>" alt="icon">
                <h6 class="title"><?php echo e(__('Withdraw Log')); ?></h6>
            </div>
        </div>
        <div class="col-3">
            <div class="mobile-box link-item">
                <a href="<?php echo e(route('user.transaction.log')); ?>" class="item-link"></a>
                <img src="<?php echo e(asset('asset/theme4/images/d-icon/4.png')); ?>" alt="icon">
                <h6 class="title"><?php echo e(__('Transaction Log')); ?></h6>
            </div>
        </div>
        <div class="col-3">
            <div class="mobile-box link-item">
                <a href="<?php echo e(route('user.interest.log')); ?>" class="item-link"></a>
                <img src="<?php echo e(asset('asset/theme4/images/d-icon/5.png')); ?>" alt="icon">
                <h6 class="title"><?php echo e(__('Interest Log')); ?></h6>
            </div>
        </div>
        <div class="col-3">
            <div class="mobile-box link-item">
                <a href="<?php echo e(route('user.commision')); ?>" class="item-link"></a>
                <img src="<?php echo e(asset('asset/theme4/images/d-icon/6.png')); ?>" alt="icon">
                <h6 class="title"><?php echo e(__('Referral Log')); ?></h6>
            </div>
        </div>
    </div>
  </div>
  <!-- mobile screen card end -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make(template() . 'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u272239730/domains/bitcoingoldtrading.com/public_html/trade/core/resources/views/theme4/pages/viewall.blade.php ENDPATH**/ ?>