<?php
$content = content('contact.content');
$contentlink = content('footer.content');
$footersociallink = element('footer.element');
$serviceElements = element('service.element');

?>

<footer class="footer-section has-bg-img">
    <div class="footer-logo-portion">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="<?php echo e(route('home')); ?>" class="footer-logo">
                        <?php if(@$general->logo): ?>
                            <img class="img-fluid rounded sm-device-img text-align"
                                src="<?php echo e(getFile('logo', @$general->whitelogo)); ?>" width="100%" alt="pp">
                        <?php else: ?>
                            <?php echo e(__('No Logo Found')); ?>

                        <?php endif; ?>
                    </a>

                    <ul class="social-links justify-content-center mt-3">
                        <?php $__empty_1 = true; $__currentLoopData = $footersociallink; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li>
                                <a href="<?php echo e(__(@$item->data->social_link)); ?>" target="_blank"
                                    class="twitter"><i class="<?php echo e(@$item->data->social_icon); ?>"></i></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </ul>

                    <ul class="footer-inline-list justify-content-center mt-4">
                        <li> <a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                        <?php $__empty_1 = true; $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li><a href="<?php echo e(route('pages', $page->slug)); ?>"><?php echo e(__($page->name)); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="footer-menu-portion">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="mb-0 footer-text-clr">
                        <?php if(@$general->copyright): ?>
                            <?php echo e(__(@$general->copyright)); ?>

                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer><?php /**PATH /home/u272239730/domains/bitcoingoldtrading.com/public_html/trade/core/resources/views/theme4/layout/footer.blade.php ENDPATH**/ ?>