<?php $__env->startSection('content2'); ?>
    <div class="dashboard-body-part">

        <div class="mobile-page-header">
            <h5 class="title"><?php echo e(__('Deposit History')); ?></h5>
            <a href="<?php echo e(route('user.dashboard')); ?>" class="back-btn"><i class="bi bi-arrow-left"></i> <?php echo e(__('Back')); ?></a>
        </div>
        
        <div class="site-card">
            <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
                <h5 class="mb-sm-0 mb-2"><?php echo e(__('Deposit Log')); ?></h5>
                <form action="" method="get">
                    <div class="row g-3">
                        <div class="col-auto">
                            <input type="text" name="trx" class="form-control form-control-sm" placeholder="transaction id">
                        </div>
                        <div class="col-auto">
                            <input type="date" class="form-control form-control-sm" placeholder="Search User" name="date">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn main-btn btn-sm"><?php echo e(__('Search')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table site-table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Trx')); ?></th>
                                <th><?php echo e(__('User')); ?></th>
                                <th><?php echo e(__('Gateway')); ?></th>
                                <th><?php echo e(__('Amount')); ?></th>
                                <th><?php echo e(__('Currency')); ?></th>
                                <th><?php echo e(__('Charge')); ?></th>
                                <th><?php echo e(__('Payment Date')); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td data-caption="<?php echo e(__('Trx')); ?>"><?php echo e($transaction->transaction_id); ?></td>
                                    <td data-caption="<?php echo e(__('User')); ?>"><?php echo e(@$transaction->user->fname . ' ' . @$transaction->user->lname); ?></td>
                                    <td data-caption="<?php echo e(__('Gateway')); ?>"><?php echo e(@$transaction->gateway->gateway_name ?? 'Account Transfer'); ?></td>
                                    <td data-caption="<?php echo e(__('Amount')); ?>"><?php echo e($transaction->amount); ?></td>
                                    <td data-caption="<?php echo e(__('Currency')); ?>"><?php echo e($general->site_currency); ?></td>
                                    <td data-caption="<?php echo e(__('Charge')); ?>"><?php echo e($transaction->charge . ' ' . $transaction->currency); ?></td>

                                    <td data-caption="<?php echo e(__('Payment Date')); ?>"><?php echo e($transaction->created_at->format('Y-m-d')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td class="text-center no-data-table" colspan="100%">
                                        <?php echo e(__('No users Found')); ?>

                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <?php if($transactions->hasPages()): ?>
                        <?php echo e($transactions->links()); ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(template().'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u272239730/domains/bitcoingoldtrading.com/public_html/trade/core/resources/views/theme4/user/deposit_log.blade.php ENDPATH**/ ?>