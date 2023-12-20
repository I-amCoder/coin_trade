

<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
            </div>
            <?php
                $counter = 0;
            ?>

            <div class="row">

                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form method="post" action="" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <a href="<?php echo e(route('admin.frontend.section.manage', request()->name)); ?>"
                                class="btn btn-primary m-3"> <i class="fas fa-arrow-left"></i> <?php echo e(__('Go back')); ?></a>
                            <div class="card-body">
                                <div class="row">

                                    <?php $__currentLoopData = $section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($key == 'is_category'): ?>
                                            <div class="form-group col-md-6">

                                                <label for=""><?php echo e(__('Category Name')); ?></label>
                                                <select name="category" class="form-control">

                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($category->id); ?>"
                                                            <?php echo e($element->category == $category->id ? 'selected' : ''); ?>>
                                                            <?php echo e($category->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </select>

                                            </div>
                                        <?php elseif($sec == 'text'): ?>
                                            <div class="form-group col-md-6">

                                                <label for=""><?php echo e(__(frontendFormatter($key))); ?></label>
                                                <input type="<?php echo e($sec); ?>" name="<?php echo e($key); ?>"
                                                    class="form-control" value="<?php echo e(@$element->data->$key); ?>">

                                            </div>
                                        <?php elseif($sec == 'file'): ?>
                                            <div class="form-group col-md-3 mb-3">
                                                <label class="col-form-label"><?php echo e(__(frontendFormatter($key))); ?></label>

                                                <div id="image-preview" class="image-preview"
                                                    style="background-image:url(<?php echo e(getFile($name, @$element->data->$key)); ?>);">
                                                    <label for="image-upload"
                                                        id="image-label"><?php echo e(__('Choose File')); ?></label>
                                                    <input type="<?php echo e($sec); ?>" name="<?php echo e($key); ?>"
                                                        id="image-upload" />
                                                </div>

                                            </div>
                                        <?php elseif($sec == 'textarea'): ?>
                                            <div class="form-group col-md-12">

                                                <label for=""><?php echo e(__(frontendFormatter($key))); ?></label>
                                                <textarea name="<?php echo e($key); ?>" class="form-control"><?php echo e(clean(@$element->data->$key ?? old($key))); ?></textarea>

                                            </div>
                                        <?php elseif($sec == 'textarea_nic'): ?>
                                            <div class="form-group col-md-12">

                                                <label for=""><?php echo e(__(frontendFormatter($key))); ?></label>
                                                <textarea name="<?php echo e($key); ?>" class="form-control summernote"><?php echo e(clean(@$element->data->$key ?? old($key))); ?></textarea>

                                            </div>
                                        <?php elseif($sec == 'icon'): ?>
                                            <div class="form-group col-md-6">
                                                <div class="input-group">
                                                    <label for=""
                                                        class="w-100"><?php echo e(__(frontendFormatter($key))); ?></label>
                                                    <input type="text" class="form-control icon-value"
                                                        name="<?php echo e($key); ?>" value="<?php echo e(@$element->data->$key); ?>">
                                                    <span class="input-group-append">
                                                        <button class="btn btn-outline-secondary iconpicker"
                                                            data-icon="fas fa-home" role="iconpicker"></button>
                                                    </span>
                                                </div>
                                            </div>
                                        <?php elseif($key == 'multiple_image'): ?>
                                            <?php $__currentLoopData = $section[$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $filetype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="form-group col-md-5 mb-3">
                                                    <label
                                                        class="col-form-label"><?php echo e(__(frontendFormatter($name))); ?></label>

                                                    <div id="image-preview-<?php echo e($loop->iteration); ?>" class="image-preview"
                                                        style="background-image:url(<?php echo e(getFile(request()->name, @$element->data->$name)); ?>);">
                                                        <label for="image-upload-<?php echo e($loop->iteration); ?>"
                                                            id="image-label-<?php echo e($loop->iteration); ?>"><?php echo e(__('Choose File')); ?></label>
                                                        <input type="<?php echo e($filetype); ?>" name="<?php echo e($name); ?>"
                                                            id="image-upload-<?php echo e($loop->iteration); ?>" />
                                                    </div>

                                                </div>

                                                <?php
                                                    $counter = count($section[$key]);
                                                ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <div class="form-group col-md-12">

                                        <button type="submit"
                                            class="form-control btn btn-primary"><?php echo e(__('Update')); ?></button>

                                    </div>
                                </div>
                            </div>

                        </form>

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

            for (let index = 1; index <= <?php echo e($counter); ?>; index++) {
                $.uploadPreview({
                    input_field: "#image-upload-" + index,
                    preview_box: "#image-preview-" + index,
                    label_field: "#image-label-" + index,
                    label_default: "<?php echo e(__('Choose File')); ?>",
                    label_selected: "<?php echo e(__('Upload File')); ?>",
                    no_label: false,
                    success_callback: null
                });

            }


            $('.summernote').summernote();
            $('.iconpicker').iconpicker();

            $('.iconpicker').on('change', function(e) {
                $('.icon-value').val(e.icon)
            })

            $.uploadPreview({
                input_field: "#image-upload", // Default: .image-upload
                preview_box: "#image-preview", // Default: .image-preview
                label_field: "#image-label", // Default: .image-label
                label_default: "<?php echo e(__('Choose File')); ?>", // Default: Choose File
                label_selected: "<?php echo e(__('Upload File')); ?>", // Default: Change File
                no_label: false, // Default: false
                success_callback: null // Default: null
            });
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u272239730/domains/bitcoingoldtrading.com/public_html/trade/core/resources/views/backend/frontend/edit.blade.php ENDPATH**/ ?>