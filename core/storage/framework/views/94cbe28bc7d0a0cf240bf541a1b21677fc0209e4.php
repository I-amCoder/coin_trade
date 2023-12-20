<?php
$content = content('howitwork.content');
$elements = element('howitwork.element')->take(8);
?>

    <section class="work-section sp_pt_120 sp_pb_120 sp_separator_bg">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 text-center">
            <div class="sp_site_header  wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
              <h2 class="sp_site_title"><?php echo e(__(@$content->data->title)); ?></h2>
            </div>
          </div>
        </div>

        <div class="row gy-4 justify-content-center">
          <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-lg-4 col-md-6">
              <div class="work-item">
                  <div class="work-number">
                      <?php echo e($loop->iteration); ?>

                  </div>
                  <div class="work-content">
                      <h4 class="title"><?php echo e(__(@$element->data->title)); ?></h4>
                      <p class="mt-2"><?= clean($element->data->short_description) ?></p>
                  </div>
              </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </section><?php /**PATH /home/u272239730/domains/bitcoingoldtrading.com/public_html/trade/core/resources/views/theme4/sections/howitwork.blade.php ENDPATH**/ ?>