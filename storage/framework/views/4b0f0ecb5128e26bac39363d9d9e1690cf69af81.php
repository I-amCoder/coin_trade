<?php
$content = content('newsletter.content');
?>

<section class="subscribe-section sp_separator_bg">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="sp_site_header">
                    <h2 class="sp_site_title"><?php echo e(__(@$content->data->title)); ?></h2>
                    <p><?php echo e(__(@$content->data->short_description)); ?></p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <form class="subscribe-form" id="subscribe" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="text" name="email" class="form-control subscribe-email"
                        placeholder="<?php echo e(__('Enter email here')); ?>">
                    <button><?php echo e(__('Subscribe')); ?> <i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/u272239730/domains/bitcoingoldtrading.com/public_html/trade/core/resources/views/theme4/sections/newsletter.blade.php ENDPATH**/ ?>