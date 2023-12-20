<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
            </div>

            <div class="row">

                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">

                        <div class="card-body p-0">

                            <table class="table table-striped" id="myTable">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('Theme')); ?></th>
                                        <th><?php echo e(__('Description')); ?></th>
                                        <th><?php echo e(__('Previw')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <h5>

                                                <?php echo e(__('Gold Theme')); ?>

                                            </h5>
                                            <p>
                                                <a data-route="<?php echo e(route('admin.manage.theme.update', 1)); ?>"
                                                    class="<?php if($general->theme != 1): ?> btn btn-outline-danger btn-sm active-btn <?php endif; ?>  <?php if($general->theme == 1): ?> text-success <?php else: ?> text-danger <?php endif; ?> font-weight-bolder">
                                                    <?php if($general->theme == 1): ?>
                                                        <?php echo e(__('Activeted')); ?>

                                                    <?php else: ?>
                                                        <?php echo e(__('Active')); ?>

                                                    <?php endif; ?>
                                                </a>
                                            </p>


                                        </td>
                                        <td><?php echo e(__('Gold Theme')); ?></td>
                                        <td>
                                            <button data-href="https://hyipmaxone.springsoftit.com/"
                                                class="btn btn-primary btn-sm prev">
                                                <?php echo e(__('Preview')); ?>

                                            </button>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <h5>

                                                <?php echo e(__('Green Theme')); ?>

                                            </h5>
                                            <p>
                                                <a data-route="<?php echo e(route('admin.manage.theme.update', 2)); ?>"
                                                    class="<?php if($general->theme != 2): ?> btn btn-outline-danger btn-sm active-btn <?php endif; ?> <?php if($general->theme == 2): ?> text-success <?php else: ?> text-danger <?php endif; ?> font-weight-bolder ">
                                                    <?php if($general->theme == 2): ?>
                                                        <?php echo e(('Activeted')); ?>

                                                    <?php else: ?>
                                                        Active
                                                    <?php endif; ?>
                                                </a>
                                            </p>
                                        </td>
                                        <td><?php echo e(__('Green Theme')); ?></td>
                                        <td>
                                            <button data-href="https://hyipmaxtwo.springsoftit.com/"
                                                class="btn btn-primary btn-sm prev">
                                                <?php echo e(__('Preview')); ?>

                                            </button>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <h5>

                                                <?php echo e(__('White Theme')); ?>

                                            </h5>
                                            <p>
                                                <a data-route="<?php echo e(route('admin.manage.theme.update', 3)); ?>"
                                                    class="<?php if($general->theme != 3): ?> btn btn-outline-danger btn-sm active-btn <?php endif; ?> <?php if($general->theme == 3): ?> text-success <?php else: ?> text-danger <?php endif; ?> font-weight-bolder">
                                                    <?php if($general->theme == 3): ?>
                                                        <?php echo e(__('Activated')); ?>

                                                    <?php else: ?>
                                                        <?php echo e(__('Active')); ?>

                                                    <?php endif; ?>
                                                </a>
                                            </p>
                                        </td>
                                        <td><?php echo e(__('White Theme')); ?></td>
                                        <td>
                                            <button data-href="https://hyipmaxthree.springsoftit.com/"
                                                class="btn btn-primary btn-sm prev">
                                                <?php echo e(__('Preview')); ?>

                                            </button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <h5>

                                                <?php echo e(__('Purple Theme')); ?>

                                            </h5>
                                            <p>
                                                <a data-route="<?php echo e(route('admin.manage.theme.update', 4)); ?>"
                                                    class="<?php if($general->theme != 4): ?> btn btn-outline-danger btn-sm active-btn <?php endif; ?> <?php if($general->theme == 4): ?> text-success <?php else: ?> text-danger <?php endif; ?> font-weight-bolder">
                                                    <?php if($general->theme == 4): ?>
                                                        <?php echo e(__('Activated')); ?>

                                                    <?php else: ?>
                                                        <?php echo e(__('Active')); ?>

                                                    <?php endif; ?>
                                                </a>
                                            </p>
                                        </td>
                                        <td><?php echo e(__('Red Theme')); ?></td>
                                        <td>
                                            <button data-href="https://hyipmaxthree.springsoftit.com/"
                                                class="btn btn-primary btn-sm prev">
                                                <?php echo e(__('Preview')); ?>

                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="activeTheme" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Active Template')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <?php echo e(__('Are you sure to active this template ?')); ?>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Active')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="prev" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal--w" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Template Preview')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <iframe src="" frameborder="0" id="iframe"></iframe>




                </div>

            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <style>
        .modal-dialog {
            max-width: 96% !important;
        }

        #iframe {
            width: 100%;
            height: 100vh;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(function() {
            'use strict'

            $('.active-btn').on('click', function() {
                const modal = $('#activeTheme');

                modal.find('form').attr('action', $(this).data('route'))

                modal.modal('show')
            })


            $('.prev').on('click', function() {
                const modal = $('#prev');

                modal.find('iframe').attr('src', $(this).data('href'))

                modal.modal('show')
            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u272239730/domains/bitcoingoldtrading.com/public_html/trade/core/resources/views/backend/setting/theme.blade.php ENDPATH**/ ?>