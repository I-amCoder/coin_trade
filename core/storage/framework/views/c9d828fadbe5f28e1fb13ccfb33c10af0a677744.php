<?php
$content = content('banner.content');
$counter = element('banner.element');
?>
    <section 
        class="banner-section paroller" 
        style="background-image: url(<?php echo e(getFile('banner', @$content->data->backgroundimage)); ?>);"
        data-paroller-factor="0.4"
        data-paroller-factor-sm="0.2"
        data-paroller-factor-xs="0.1"
    >

        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 text-lg-start text-center"> 
                    <div 
                        class="banner-content paroller"
                        data-paroller-factor="0.4"
                        data-paroller-factor-sm="0.2"
                        data-paroller-factor-xs="0.1"
                    >
                        <h2 class="banner-title wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s"><?php echo e(__(@$content->data->title)); ?></h2>
                        <p class="banner-description mt-3 wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.5s"><?php echo e(__(@$content->data->short_description)); ?></p>
                        <div class="mt-4 wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.7s">
                            <a href="<?php echo e(@$content->data->button_text_link); ?>" class="btn main-btn me-3">
                                <span><?php echo e(__('Get Started')); ?></span>
                            </a>
                            <a href="<?php echo e($content->data->button_text_2_link); ?>" class="btn main-btn2 bg-white sp_text_dark">
                                <span><?php echo e(__('Know More')); ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="counter-section"> 
        <div class="container"> 
            <div class="row counter-wrapper justify-content-center">
                <?php $__currentLoopData = $counter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="counter-item">
                            <h3 class="counter-title"><?php echo e($count->data->total); ?></h3>
                            <p class="caption"><?php echo e($count->data->title); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div> 
    </div>

    <?php $__env->startPush('style'); ?>
    <style>
        .tradingview-widget-container{
            height: 46px !important;
        }
        .tradingview-widget-copyright {
            display: none;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/u272239730/domains/bitcoingoldtrading.com/public_html/trade/core/resources/views/theme4/sections/banner.blade.php ENDPATH**/ ?>