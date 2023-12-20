

<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
            </div>


            <div class="row">

                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">

                                <?php echo csrf_field(); ?>

                                <div class="row">

         

                                    <div class="form-group col-md-7">

                                        <label for=""><?php echo e(__('Allow Preloader')); ?></label>

                                        <select name="preloader_status" id="" class="form-control selectric">

                                            <option value="1" <?php echo e(@$general->preloader_status ? 'selected' : ''); ?>>
                                                <?php echo e(__('Yes')); ?></option>
                                            <option value="0" <?php echo e(@$general->preloader_status ? '' : 'selected'); ?>>
                                                <?php echo e(__('No')); ?></option>

                                        </select>

                                    </div>

                                    <div class="form-group col-md-12">

                                        <button type="submit" class="btn btn-primary float-left"><?php echo e(__('Preloader Update')); ?></button>

                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>

    <script>
        $(function() {
            'use strict'


            $.uploadPreview({
                input_field: "#image-upload", // Default: .image-upload
                preview_box: "#image-preview", // Default: .image-preview
                label_field: "#image-label", // Default: .image-label
                label_default: "<?php echo e(__('Choose File')); ?>", // Default: Choose File
                label_selected: "<?php echo e(__('Update Image')); ?>", // Default: Change File
                no_label: true, // Default: false
                success_callback: null // Default: null
            });
        })
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u272239730/domains/bitcoingoldtrading.com/public_html/trade/core/resources/views/backend/setting/preloader.blade.php ENDPATH**/ ?>