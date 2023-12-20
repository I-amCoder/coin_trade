


<?php $__env->startSection('content2'); ?>
    <div class="dashboard-body-part">
        <div class="mobile-page-header">
            <h5 class="title"><?php echo e(__('Authentication')); ?></h5>
            <a href="<?php echo e(route('user.dashboard')); ?>" class="back-btn"><i class="bi bi-arrow-left"></i> <?php echo e(__('Back')); ?></a>
        </div>
        
        <div class="d-flex flex-wrap justify-content-between mb-3">
            <h5><?php echo e(__('Profile Setting')); ?></h5>
            <a href="<?php echo e(route('user.change.password')); ?>" class="cmn-btn mb-2 sp_text_dark"><i class="bi bi-shield-lock"></i> <?php echo e(__('Change Password')); ?></a>
        </div>
        <div class="site-card">
            <div class="card-body">
                <form action="<?php echo e(route('user.profileupdate')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row gy-4 justify-content-center">
                        <div class="col-md-4 pe-lg-5 pe-md-4 justify-content-center">
                            <div class="img-choose-div">
                                <p><?php echo e(__('Profile Picture')); ?></p>

                                    <img class=" rounded file-id-preview w-100" id="file-id-preview"
                                        src="<?php echo e(getFile('user', @Auth::user()->image)); ?>" alt="pp">

                                <input type="file" name="image" id="imageUpload" class="upload"
                                    accept=".png, .jpg, .jpeg" hidden>

                                <label for="imageUpload" class="editImg btn main-btn w-100"><span><?php echo e(__('Choose file')); ?></span></label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="update">
                                <div class="mb-3">
                                    <label><?php echo e(__('First Name')); ?></label>
                                    <input type="text" class="form-control" name="fname"
                                        value="<?php echo e(@Auth::user()->fname); ?>"
                                        placeholder="<?php echo e(__('Enter First Name')); ?>">
                                </div>
                                <div class="mb-3">
                                    <label><?php echo e(__('Last Name')); ?></label>
                                    <input type="text" class="form-control" name="lname"
                                        value="<?php echo e(@Auth::user()->lname); ?>"
                                        placeholder="<?php echo e(__('Enter Last Name')); ?>">
                                </div>
                                <div class="mb-3">
                                    <label><?php echo e(__('Username')); ?></label>
                                    <input type="text" class="form-control text-white" name="username"
                                        value="<?php echo e(@Auth::user()->username); ?>"
                                        placeholder="<?php echo e(__('Enter User Name')); ?>">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label><?php echo e(__('Email address')); ?></label>
                                <input type="email" class="form-control" name="email"
                                    value="<?php echo e(@Auth::user()->email); ?>" placeholder="<?php echo e(__('Enter Email')); ?>">
                            </div>

                            <div class="mb-3">
                                <label><?php echo e(__('Phone')); ?></label>
                                <input type="text" class="form-control" name="phone"
                                    value="<?php echo e(@Auth::user()->phone); ?>" placeholder="<?php echo e(__('Enter Phone')); ?>">
                            </div>


                            <div class="row">

                                <div class="form-group col-md-6 mb-3 ">
                                    <label><?php echo e(__('Country')); ?></label>
                                    <input type="text" name="country" class="form-control"
                                        value="<?php echo e(@Auth::user()->address->country); ?>">
                                </div>

                                <div class="col-md-6 mb-3">

                                    <label><?php echo e(__('city')); ?></label>
                                    <input type="text" name="city" class="form-control form_control"
                                        value="<?php echo e(@Auth::user()->address->city); ?>">

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label><?php echo e(__('zip')); ?></label>
                                    <input type="text" name="zip" class="form-control form_control"
                                        value="<?php echo e(@Auth::user()->address->zip); ?>">

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label><?php echo e(__('state')); ?></label>
                                    <input type="text" name="state" class="form-control form_control"
                                        value="<?php echo e(@Auth::user()->address->state); ?>">

                                </div>

                            </div>

                            <button class="btn main-btn mt-3 w-100"><span><?php echo e(__('Update')); ?></span></button>
                        </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        'use strict'
        document.getElementById("imageUpload").onchange = function() {
            show();
        };

        function show() {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-id-preview");
                preview.src = src;
                preview.style.display = "block";
                document.getElementById("file-id-preview").style.visibility = "visible";
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(template().'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u272239730/domains/bitcoingoldtrading.com/public_html/trade/core/resources/views/theme4/user/profile.blade.php ENDPATH**/ ?>