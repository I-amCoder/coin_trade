<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <?php if(count($coins) < 2): ?>
                            <div class="card-header justify-content-end">
                                <button data-href="<?php echo e(route('admin.coins.store')); ?>" class="btn btn-primary addCoin"> <i
                                        class="fa fa-plus"></i>
                                    <?php echo e(__('Coin')); ?></button>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <?php $__currentLoopData = $coins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card shadow h-100">
                                            <div class="card-body text-center">
                                                <h5><?php echo e($coin->name); ?></h5>
                                                <p>Current Price:
                                                    <?php echo e(number_format($coin->current_price, 2) . ' ' . @$general->site_currency); ?>

                                                </p>
                                                <img style="max-width: 200px; object-fit: cover"
                                                    src="<?php echo e(getFile('Coins', $coin->logo)); ?>" alt="logo">
                                            </div>
                                            <div class="card-footer">
                                                <button data-href="<?php echo e(route('admin.coins.update', $coin->id)); ?>"
                                                    data-coin="<?php echo e(json_encode($coin)); ?>"
                                                    class="btn btn-warning editCoin">Edit</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="coinModal">
        <div class="modal-dialog ">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add New Coin</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input hidden name="_method">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="form-label">Coin Name</label>
                            <input name="name" value="<?php echo e(old('name')); ?>" type="text" id="name"
                                class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Coin Name" required>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Initial Price</label>
                            <div class="input-group">
                                <input type="number" step="any"
                                    class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="price"
                                    value="<?php echo e(old('price')); ?>" placeholder="Coin Price">
                                <div class="input-group-append">
                                    <div class="input-group-text"><?php echo e(@$general->site_currency); ?></div>
                                </div>
                            </div>
                            <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Coin Minimum Price</label>
                            <div class="input-group">
                                <input type="number" step="any"
                                    class="form-control <?php $__errorArgs = ['minimum_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="minimum_price"
                                    value="<?php echo e(old('minimum_price')); ?>" placeholder="Coin Minimum Price">
                                <div class="input-group-append">
                                    <div class="input-group-text"><?php echo e(@$general->site_currency); ?></div>
                                </div>
                            </div>
                            <?php $__errorArgs = ['minimum_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Coin Maximum Price</label>
                            <div class="input-group">
                                <input type="number" step="any"
                                    class="form-control <?php $__errorArgs = ['maximum_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="maximum_price"
                                    value="<?php echo e(old('maximum_price')); ?>" placeholder="Coin Maximum Price">
                                <div class="input-group-append">
                                    <div class="input-group-text"><?php echo e(@$general->site_currency); ?></div>
                                </div>
                            </div>
                            <?php $__errorArgs = ['maximum_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Logo</label>
                            <input type="file" accept=".jpg, .png, .jpeg, .webp" step="any"
                                class="form-control <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="logo"
                                value="<?php echo e(old('logo')); ?>" placeholder="Coin Maximum Price">
                            <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-danger"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            $(".addCoin").click(function(e) {
                e.preventDefault();
                var modal = $("#coinModal");
                modal.find('form').attr('action', $(this).data('href'));
                modal.find('input[name=_method]').val("POST");
                modal.modal('show');
            });

            $(".editCoin").click(function(e) {
                e.preventDefault();
                var modal = $("#coinModal");
                modal.find('form').attr('action', $(this).data('href'));

                modal.find('input[name=_method]').val("PUT");
                modal.find('input[name=name]').val($(this).data('coin').name);
                modal.find('input[name=price]').val($(this).data('coin').current_price);
                modal.find('input[name=minimum_price]').val($(this).data('coin').minimum_price);
                modal.find('input[name=maximum_price]').val($(this).data('coin').maximum_price);
                modal.modal('show');
            });

            $("#coinModal").on('hidden.bs.modal', function() {
                var modal = $("#coinModal");
                modal.find('input[name=name]').val('');
                modal.find('input[name=price]').val('');
                modal.find('input[name=minimum_price]').val('');
                modal.find('input[name=maximum_price]').val('');
                modal.find('input[name=_method]').val('');
                modal.find('input[name=logo]').val('');

            });

            <?php if(Session::has('errors')): ?>
                $("#coinModal").modal('show');
            <?php endif; ?>
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\wahab\resources\views/backend/coins/index.blade.php ENDPATH**/ ?>