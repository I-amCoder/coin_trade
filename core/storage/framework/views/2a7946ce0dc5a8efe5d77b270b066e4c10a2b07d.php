<?php
$content = content('testimonial.content');
$elements = element('testimonial.element');

?>

<section class="testimonial-section sp_pt_120 sp_pb_120 sp_separator_bg">
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 text-center">
            <div class="sp_site_header  wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
              <h2 class="sp_site_title"><?php echo e(__(@$content->data->title)); ?></h2>
            </div>
          </div>
        </div>

        <div class="testimonial-slider">
            <?php $__empty_1 = true; $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="single-slide">
                    <div class="testimonial-item">
                        <p class="testimonial-details"><?php echo e(@$element->data->answer); ?></p>
                        <div class="testimonial-client">
                            <div class="thumb">
                                <img src="<?php echo e(getFile('testimonial', @$element->data->image)); ?>" alt="image">
                            </div>
                            <div class="content">
                                <h5 class="name"><?php echo e(@$element->data->client_name); ?></h5>
                                <p><?php echo e(@$element->data->designation); ?></p>
                            </div>
                        </div>
                    </div><!-- testimonial-item end -->
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH /home/u272239730/domains/bitcoingoldtrading.com/public_html/trade/core/resources/views/theme4/sections/testimonial.blade.php ENDPATH**/ ?>