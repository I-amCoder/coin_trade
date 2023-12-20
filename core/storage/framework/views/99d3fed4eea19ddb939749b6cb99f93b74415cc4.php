<?php $__env->startSection('content2'); ?>
    <div class="dashboard-body-part">

        <div class="mobile-page-header">
            <h5 class="title"><?php echo e(__('Referral History')); ?></h5>
            <a href="<?php echo e(route('user.dashboard')); ?>" class="back-btn"><i class="bi bi-arrow-left"></i> <?php echo e(__('Back')); ?></a>
        </div>
        
        <div class="site-card">
            <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
                <h5 class="mb-sm-0 mb-2"><?php echo e(__('Referral Log')); ?></h5>
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
                                <th scope="col"><?php echo e(__('Commison From')); ?></th>
                                <th scope="col"><?php echo e(__('Amount')); ?></th>
                                <th scope="col"><?php echo e(__('Return Details')); ?></th>
                                <th scope="col"><?php echo e(__('Commision Date')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $commison; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td data-caption="From"><?php echo e(@$item->commissionFrom->username); ?></td>
                                    <td data-caption="To"><?php echo e(number_format($item->amount, 2)); ?>

                                        <?php echo e(@$general->site_currency); ?></td>
                                    <td><?php echo e($item->purpouse); ?></td>
                                    <td data-caption="<?php echo e(__('date')); ?>"><?php echo e($item->created_at->format('y-m-d')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td data-caption="Data" class="text-center" colspan="100%"><?php echo e(__('No Data Found')); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <?php echo e($commison->links('backend.partial.paginate')); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(template().'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u272239730/domains/bitcoingoldtrading.com/public_html/trade/core/resources/views/theme4/user/commision_log.blade.php ENDPATH**/ ?>