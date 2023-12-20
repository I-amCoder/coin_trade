

<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
            </div>


            <div class="row">

                <div class="col-md-12">


                    <div class="card">

                        <div class="card-body">

                            <div class="row">

                                <form action="" method="POST" class="col-md-12">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <h6><?php echo e(__('Add Sections')); ?></h6>

                                            <p><?php echo e(__('Select The Section You Want to add your page')); ?></p>
                                            <ol class="simple_with_drop vertical section_style draggable-area ">

                                                <?php if($page->sections != null): ?>


                                                    <div class="d-flex justify-content-start flex-wrap">

                                                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                            <div class="col-md-3 my-2 selectable" id="<?php echo e($key); ?>"
                                                                data-clicked="<?php echo e(in_array($key, $page->sections) ? 'off' : 'on'); ?>"
                                                                data-section="<?php echo e($key); ?>">
                                                                <div
                                                                    class="p-3 <?php echo e(in_array($key, $page->sections) ? 'bg-success' : 'bg-primary'); ?> text-center">
                                                                    <span class="text-white counter">
                                                                        <?php echo e(in_array($key, $page->sections) ? array_search($key, $page->sections) + 1 : ''); ?>

                                                                    </span>
                                                                    <span
                                                                        class="text-white text-center"><?php echo e(frontendFormatter($key)); ?>

                                                                    </span>


                                                                </div>
                                                            </div>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        <input type="hidden" name="sections[]" id="section_val">
                                                    </div>



                                                <?php endif; ?>

                                            </ol>

                                        </div>


                                        <div class="form-group col-md-6 <?php echo e($page->name == 'home' ? 'd-none' : ''); ?>">

                                            <label for=""><?php echo e(__('Page Name')); ?></label>

                                            <input type="text" name="page" class="form-control" required
                                                value="<?php echo e($page->name); ?>">

                                        </div>

                                        <div class="form-group <?php echo e($page->name == 'home' ? 'col-md-12' : 'col-md-6'); ?>">

                                            <label for=""><?php echo e(__('Page Order')); ?></label>

                                            <input type="text" name="page_order" class="form-control"
                                                value="<?php echo e($page->page_order); ?>">

                                        </div>


                                        <div class="form-group col-md-6 <?php echo e($page->name == 'home' ? 'd-none' : ''); ?>">

                                            <label for=""><?php echo e(__('status')); ?></label>

                                            <select name="status" class="form-control">

                                                <option value="1" <?php echo e($page->status ? 'selected' : ''); ?>>
                                                    <?php echo e(__('Active')); ?></option>
                                                <option value="0" <?php echo e($page->status ? '' : 'selected'); ?>>
                                                    <?php echo e(__('Inactive')); ?></option>

                                            </select>

                                        </div>

                                        <div class="form-group col-md-6 <?php echo e($page->name == 'home' ? 'd-none' : ''); ?>">

                                            <label for=""><?php echo e(__('Is Dropdown')); ?></label>

                                            <select name="dropdown" class="form-control">

                                                <option value="1" <?php echo e($page->is_dropdown ? 'selected' : ''); ?>>
                                                    <?php echo e(__('Yes')); ?></option>
                                                <option value="0" <?php echo e($page->is_dropdown ? '' : 'selected'); ?>>
                                                    <?php echo e(__('No')); ?></option>

                                            </select>

                                        </div>

                                        <div class="form-group col-md-12">

                                            <label for=""><?php echo e(__('Seo Description')); ?></label>
                                            <textarea name="seo_description" id="" cols="30" rows="5"
                                                class="form-control"><?php echo e($page->seo_description ?? old('seo_description')); ?></textarea>

                                        </div>


                                        <div
                                            class="form-group col-md-12 custom-section <?php echo e($page->custom_section_data != null ? '' : 'd-none'); ?>">

                                            <label for=""><?php echo e(__('Custom Section')); ?></label>
                                            <textarea name="custom_section" id="" cols="30" rows="5"
                                                class="form-control summernote"><?php echo e($page->custom_section_data ?? old('custom_section')); ?></textarea>

                                        </div>


                                        <div class="col-md-12">
                                            <button type="submit"
                                                class="btn btn-primary float-right"><?php echo e(__('Update Page')); ?></button>
                                        </div>



                                    </div>


                                </form>

                            </div>

                        </div>


                    </div>


                </div>




            </div>


        <?php $__env->stopSection(); ?>
        <?php $__env->startPush('script'); ?>
            <script>
                (function($) {
                    "use strict";
                    let sections = [];
                    <?php $__currentLoopData = $page->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        sections.push("<?php echo e($section); ?>")
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    $('.selectable').each(function(index) {

                        $(this).on('click', function() {

                            if ($(this).attr('data-clicked') == 'off') {

                                $(this).children().removeClass('bg-success').addClass('bg-primary');

                                let value = $(this).attr('data-section')

                                let index = sections.indexOf(value)


                                sections.splice(index, 1)

                                $(this).attr('data-clicked', 'on')


                                counter(sections, value)

                                $('#section_val').val(JSON.stringify(sections));


                                return false;


                            }

                            $(this).children().removeClass('bg-primary').addClass('bg-success');

                            $(this).attr('data-clicked', 'off');

                            sections.push($(this).data('section'))

                            $(this).children().find('.counter').removeClass('d-none').text(sections.indexOf(
                                $(this).data('section')) + 1)

                            $('#section_val').val(JSON.stringify(sections));



                        })
                    })


                    function counter(sections, romovalSectionId) {

                        if (sections.indexOf(romovalSectionId)) {
                            $('#' + romovalSectionId).children().find('.counter').addClass('d-none')
                        }

                        for (let index = 0; index < sections.length; index++) {

                            let counterIndex = sections.indexOf(sections[index]) + 1;

                            $('#' + sections[index]).children().find('.counter').removeClass('d-none')
                                .text(counterIndex)



                        }

                    }

                })(jQuery);
            </script>
        <?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u272239730/domains/bitcoingoldtrading.com/public_html/trade/core/resources/views/backend/frontend/page_edit.blade.php ENDPATH**/ ?>