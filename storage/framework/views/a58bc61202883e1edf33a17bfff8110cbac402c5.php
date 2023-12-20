<?php
$content = content('feature.content');
[$elements] = element('feature.element')->chunk(6);


?>
    <section class="benefit-section sp_pt_120 sp_pb_120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <div class="sp_site_header  wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
                        <h2 class="sp_site_title"><?php echo e(__(@$content->data->title)); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row gy-4">
                <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.7s">
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="<?php echo e(@$element->data->card_icon); ?>"></i>
                        </div>
                        <div class="benefit-content">
                            <h4 class="title"><?php echo e(__(@$element->data->card_title)); ?></h4>
                            <p class="mt-2"><?php echo e(__(@$element->data->card_description)); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section><?php /**PATH /home/u272239730/domains/bitcoingoldtrading.com/public_html/trade/core/resources/views/theme4/sections/feature.blade.php ENDPATH**/ ?>