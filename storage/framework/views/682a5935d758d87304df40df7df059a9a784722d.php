<?php $__env->startSection('content2'); ?>
    <div class="dashboard-body-part">
        
        <div class="mobile-page-header">
            <h5 class="title"><?php echo e(__('Interest History')); ?></h5>
            <a href="<?php echo e(route('user.dashboard')); ?>" class="back-btn"><i class="bi bi-arrow-left"></i> <?php echo e(__('Back')); ?></a>
        </div>
        
        <div class="site-card">
            <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
                <h5 class="mb-sm-0 mb-2"><?php echo e(__('Interest Log')); ?></h5>
                <form action="" method="get" class="d-inline-flex">
                    <input type="date" class="form-control form-control-sm me-3" placeholder="Search User" name="date">
                    <button type="submit" class="btn main-btn btn-sm"><?php echo e(__('Search')); ?></button>
                </form>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table site-table">
                        <thead>
                            <tr class="bg-yellow">
                                <th><?php echo e(__('Plan Name')); ?></th>
                                <th><?php echo e(__('Interest')); ?></th>
                                <th><?php echo e(__('Invest Amount')); ?></th>
                                <th><?php echo e(__('Payment Date')); ?></th>
                                <th><?php echo e(__('Next Payment Date')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $interestLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td data-caption="<?php echo e(__('Plan Name')); ?>"><?php echo e($log->payment->plan->plan_name); ?></td>
                                    <td data-caption="<?php echo e(__('Interest')); ?>"><?php echo e(number_format($log->interest_amount, 2)); ?>

                                        <?php echo e(@$general->site_currency); ?></td>
                                    <td data-caption="<?php echo e(__('Invest Amount')); ?>"><?php echo e(number_format($log->payment->amount, 2)); ?>

                                        <?php echo e(@$general->site_currency); ?></td>
                                    <td data-caption="<?php echo e(__('Payment Date')); ?>"><?php echo e($log->created_at); ?></td>
                                    <td data-caption="<?php echo e(__('Next Payment Date')); ?>">
                                        <?php echo e(isset($log->payment->next_payment_date) ? $log->payment->next_payment_date : 'Plan Expired'); ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td class="text-center no-data-table" colspan="100%"><?php echo e(__('No Data Found')); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(template() . 'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u272239730/domains/bitcoingoldtrading.com/public_html/trade/core/resources/views/theme4/user/interest_log.blade.php ENDPATH**/ ?>