<?php $__env->startPush('script'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/he/1.2.0/he.min.js"
        integrity="sha512-PEsccDx9jqX6Dh4wZDCnWMaIO3gAaU0j46W//sSqQhUQxky6/eHZyeB3NrXD2xsyugAKd4KPiDANkcuoEa2JuA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <style>
        /* Custom styles for active and inactive tabs */
        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            background: #30E8BF;
            background: -webkit-linear-gradient(to right, #FF8235, #30E8BF);
            background: linear-gradient(to right, #FF8235, #30E8BF);

            color: white !important;
            border-radius: 5px;
            border: none;
        }

        .nav-tabs .nav-link {
            background-color: #f8f9fa;
            color: #000;
            font-weight: bolder;
            border-radius: 5px;
            margin: 0 10px;
        }
    </style>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                        <?php $__currentLoopData = $coins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item w-50 text-center" style="border-width: 3px;">
                                <a class="nav-link <?php echo e($loop->first ? 'active' : ''); ?>" id="nav-<?php echo e($coin->id); ?>-tab"
                                    data-toggle="tab" href="#nav-<?php echo e($coin->id); ?>" role="tab"
                                    aria-controls="nav-<?php echo e($coin->id); ?>" aria-selected="true"><?php echo e($coin->name); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>

            <div class="tab-content" id="nav-tabContent">
                <?php $__currentLoopData = $coins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="tab-pane fade show <?php echo e($loop->first ? 'active' : ''); ?>" id="nav-<?php echo e($coin->id); ?>"
                        role="tabpanel" aria-labelledby="nav-<?php echo e($coin->id); ?>-tab">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3><?php echo e($coin->name); ?></h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <?php echo $__env->make('common.chart', ['coin' => $coin], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>
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
                                                                <div class="input-group-text">
                                                                    <?php echo e(@$general->site_currency); ?></div>
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
                                                                <div class="input-group-text">
                                                                    <?php echo e(@$general->site_currency); ?></div>
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
                                                <form action="<?php echo e(route('admin.coins.price.update', $coin->id)); ?>"
                                                    method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <h5>Current Coin Price <span
                                                            id="coin_price_<?php echo e($coin->id); ?>"><?php echo e($coin->current_price); ?></span><?php echo e(@$general->site_currency); ?>

                                                    </h5>
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
                                                                <div class="input-group-text">
                                                                    <?php echo e(@$general->site_currency); ?></div>
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
                                                    <button type="submit"class="btn btn-warning">Update</button>
                                                </form>
                                            </div>

                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <?php echo $__env->make('backend.coins.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\wahab\resources\views/backend/coins/stats.blade.php ENDPATH**/ ?>