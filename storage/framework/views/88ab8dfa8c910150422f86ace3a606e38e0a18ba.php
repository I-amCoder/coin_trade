<?php $__env->startSection('content2'); ?>
<div class="dashboard-body-part">

    <div class="mobile-page-header">
        <h5 class="title"><?php echo e(__('Investment')); ?></h5>
        <a href="<?php echo e(route('user.dashboard')); ?>" class="back-btn"><i class="bi bi-arrow-left"></i> <?php echo e(__('Back')); ?></a>
    </div>

    <div class="row gy-4 items-wrapper justify-content-center">
        <?php $__empty_1 = true; $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                $plan_exist = App\Models\Payment::where('plan_id', $plan->id)
                    ->where('user_id', Auth::id())
                    ->where('next_payment_date', '!=', null)
                    ->where('payment_status', 1)
                    ->count();
            ?>
            <div class="col-xxl-4 col-xl-6 col-md-6"> 
                <div class="plan-item">
                    <div class="plan-name-area">
                        <h3 class="plan-name mb-2"><?php echo e($plan->plan_name); ?></h3>
                        <span class="plan-status"><?php echo e(__('Every')); ?> <?php echo e($plan->time->name); ?></span>
                    </div>
                    <div class="plan-fatures">
                        <ul class="plan-list">
                            <?php if($plan->amount_type == 0): ?>
                            <li>
                                <span class="caption"><?php echo e(__('Minimum')); ?> </span>
                                <span class="details"> <?php echo e(number_format($plan->minimum_amount, 2) . ' ' . @$general->site_currency); ?></span>
                            </li>
                            <li>
                                <span class="caption"><?php echo e(__('Maximum')); ?> </span>
                                <span class="details"> <?php echo e(number_format($plan->maximum_amount, 2) . ' ' . @$general->site_currency); ?></span>
                            </li>
                            <?php else: ?>
                            <li>
                                <span class="caption"><?php echo e(__('Amount')); ?> </span>
                                <span class="details"> <?php echo e(number_format($plan->amount, 2) . ' ' . @$general->site_currency); ?></span>
                            </li>
                            <?php endif; ?>

                            <?php if($plan->return_for == 1): ?>
                            <li>
                                <span class="caption"><?php echo e(__('For')); ?> </span>
                                <span class="details"> <?php echo e($plan->how_many_time); ?> <?php echo e(__('Times')); ?></span>
                            </li>
                            <?php else: ?>
                            <li>
                                <span class="caption"><?php echo e(__('For')); ?> </span>
                                <span class="details"> <?php echo e(__('Lifetime')); ?></span>
                            </li>
                            <?php endif; ?>

                            <?php if($plan->capital_back == 1): ?>
                            <li>
                                <span class="caption"><?php echo e(__('Capital Back')); ?> </span>
                                <span class="details"> <?php echo e(__('YES')); ?></span>
                            </li>
                            <?php else: ?>
                            <li>
                                <span class="caption"><?php echo e(__('Capital Back')); ?> </span>
                                <span class="details"> <?php echo e(__('NO')); ?></span>
                            </li>
                            <?php endif; ?>
                        </ul>

                        <div class="plan-rio">
                            <h6><?php echo e(__('ROI')); ?></h6>
                            <p class="plan-amount">
                                <?php echo e(number_format($plan->return_interest, 2)); ?> <?php if($plan->interest_status == 'percentage'): ?>
                                <?php echo e('%'); ?>

                                <?php else: ?>
                                <?php echo e(@$general->site_currency); ?>

                                <?php endif; ?>
                            </p>
                        </div>

                        <h6 class="mt-4 mb-3"><?php echo e(__('Affiliate Bonus')); ?></h6>
                        <ul class="plan-referral">
                            <?php if($plan->referrals): ?>
                                <?php $__currentLoopData = $plan->referrals->level; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="single-referral">
                                        <span><?php echo e($plan->referrals->commision[$key]); ?> %</span>
                                        <p><?php echo e($value); ?></p>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>

                    </div>
                    <div class="plan-action">
                        <?php if($plan_exist >= $plan->invest_limit): ?>
                        <a class="main-btn plan-btn w-100 disabled" href="#">
                            <span><?php echo e(__('Max Limit exceeded')); ?></span>
                        </a>
                        <?php else: ?>
                        <a class="main-btn plan-btn w-100" href="<?php echo e(route('user.gateways', $plan->id)); ?>">
                            <span><?php echo e(__('Invest Now')); ?></span>
                        </a>
                        <?php if(auth()->guard()->check()): ?>
                        <button class="main-btn2 bg-white sp_text_dark balance w-100 mt-2" data-plan="<?php echo e($plan); ?>" data-url=""><span><?php echo e(__('Invest Using Balance')); ?></span></button>
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php endif; ?>
    </div>
</div>


<div class="modal fade" id="invest" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?php echo e(route('user.investmentplan.submit')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Invest Now')); ?></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for=""><?php echo e(__('Invest Amount')); ?></label>
                            <input type="text" name="amount" class="form-control">
                            <input type="hidden" name="plan_id" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                    <button type="submit" class="main-btn"><span><?php echo e(__('Invest Now')); ?></span></button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(function() {
            'use strict'

            $('.balance').on('click', function() {
                const modal = $('#invest');
                modal.find('input[name=plan_id]').val($(this).data('plan').id);
                modal.modal('show')
            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(template().'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u272239730/domains/bitcoingoldtrading.com/public_html/trade/core/resources/views/theme4/pages/invest.blade.php ENDPATH**/ ?>