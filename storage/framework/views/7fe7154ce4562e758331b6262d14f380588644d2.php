<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
            </div>

            <div class="row">
                <?php $__currentLoopData = $coins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3><?php echo e($coin->name); ?></h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form action="<?php echo e(route('admin.coins.bounderies.update', $coin->id)); ?>"
                                            method="POST">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-group">
                                                <label for="" class="form-label">Coin Minimum Price</label>
                                                <div class="input-group">
                                                    <input type="number" step="any"
                                                        class="form-control <?php $__errorArgs = ['minimum_price_' . $coin->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        name="minimum_price_<?php echo e($coin->id); ?>"
                                                        value="<?php echo e(old('minimum_price_' . $coin->minimum_price, $coin->minimum_price)); ?>"
                                                        placeholder="Coin Minimum Price">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text"><?php echo e(@$general->site_currency); ?></div>
                                                    </div>
                                                </div>
                                                <?php $__errorArgs = ['minimum_price_' . $coin->id];
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
                                                        class="form-control <?php $__errorArgs = ['maximum_price_' . $coin->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        name="maximum_price_<?php echo e($coin->id); ?>"
                                                        value="<?php echo e(old('maximum_price' . $coin->maximum_price, $coin->maximum_price)); ?>"
                                                        placeholder="Coin Maximum Price">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text"><?php echo e(@$general->site_currency); ?></div>
                                                    </div>
                                                </div>
                                                <?php $__errorArgs = ['maximum_price_' . $coin->id];
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
                                            <button type="submit"class="btn btn-info">Update</button>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <form action="<?php echo e(route('admin.coins.price.update', $coin->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-group">
                                                <label for="" class="form-label">Coin Current Price</label>
                                                <div class="input-group">
                                                    <input type="number" step="any"
                                                        class="form-control <?php $__errorArgs = ['price_' . $coin->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        name="price_<?php echo e($coin->id); ?>"
                                                        value="<?php echo e(old('price_' . $coin->current_price, $coin->current_price)); ?>"
                                                        placeholder="Coin Minimum Price">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text"><?php echo e(@$general->site_currency); ?></div>
                                                    </div>
                                                </div>
                                                <?php $__errorArgs = ['price_' . $coin->id];
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
                                            <button type="submit"class="btn btn-info">Update</button>
                                        </form>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\wahab\resources\views/backend/coins/stats.blade.php ENDPATH**/ ?>