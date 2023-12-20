<?php
$investor = content('investor.content');

$topInvestor = App\Models\Payment::where('payment_status',1)->groupBy('user_id')
    ->selectRaw('sum(amount) as sum, user_id')
    ->orderBy('sum', 'desc')
    ->get()
    ->map(function ($a) {
        return App\Models\User::find($a->user_id);
    });

?>

<section class="investor-section sp_pt_120 sp_pb_120 sp_separator_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="sp_site_header  wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
                    <h2 class="sp_site_title"><?php echo e(@$investor->data->title); ?></h2>
                </div>
            </div>
        </div>
        <div class="investor-slider">
            <?php $__currentLoopData = $topInvestor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="single-slide">
                    <div class="investor-item">
                        <div class="investor-thumb">
                            <div class="investor-thumb-inner">
                                <img src="<?php echo e(getFile('user', @$top->image)); ?>" alt="image">
                            </div>
                        </div>
                        <div class="investor-content">
                            <h4 class="name"><?php echo e($top->full_name); ?></h4>
                            <p class="mt-2"><?php echo e(__('Invest Amount')); ?> <span class="site-color"><?php echo e(number_format($top->payments()->where('payment_status',1)->sum('amount'),2) .' '. $general->site_currency); ?></span></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section><?php /**PATH /home/u272239730/domains/bitcoingoldtrading.com/public_html/trade/core/resources/views/theme4/sections/investor.blade.php ENDPATH**/ ?>