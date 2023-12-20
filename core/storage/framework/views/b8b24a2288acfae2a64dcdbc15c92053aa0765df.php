<?php $__env->startSection('content'); ?>
    <?php $__env->startPush('seo'); ?>
        <meta name='description' content="<?php echo e(@$general->seo_description); ?>">
    <?php $__env->stopPush(); ?>
    <section class="auth-section">
        <div class="auth-wrapper">
            <div class="auth-top-part">
             <!--   <a href="<?php echo e(route('home')); ?>" class="auth-logo">
                    <img class="img-fluid rounded sm-device-img text-align" src="<?php echo e(getFile('logo', @$general->whitelogo)); ?>"
                        width="100%" alt="pp">
                </a> -->
                <p class="mb-0"><span class="me-2"><?php echo e(__('Haven\'t an Account?')); ?></span> <a class="btn gr-bg-8 text-white btn-sm" href="<?php echo e(route('user.register')); ?>"><?php echo e(__('Register')); ?></a></p>
            </div>
            <div class="auth-body-part">
                <div class="auth-form-wrapper">
                    <h3 class="text-center mb-4"><?php echo e(__('Login Your Account')); ?></h3>
                    <form action="" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="formGroupExampleInput"><?php echo e(__('Email')); ?></label>
                            <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" id="email"
                                placeholder="<?php echo e(__('Enter Your Email')); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput"><?php echo e(__('Pasword')); ?></label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="<?php echo e(__('Enter Password')); ?>">
                        </div>
                        <p class="text-end"><a href="<?php echo e(route('user.forgot.password')); ?>"
                                class="sp_text_dark"><?php echo e(__('Forget password?')); ?></a></p>
                        <?php if(@$general->allow_recaptcha == 1): ?>
                            <div class="col-md-12 my-3">
                                <script src="https://www.google.com/recaptcha/api.js"></script>
                                <div class="g-recaptcha" data-sitekey="<?php echo e(@$general->recaptcha_key); ?>"
                                    data-callback="verifyCaptcha"></div>
                                <div id="g-recaptcha-error"></div>
                            </div>
                        <?php endif; ?>
                        <button class="btn gr-bg-9 text-white w-50 mt-3" type="submit"> <span><?php echo e(__('Log In')); ?> </span></button>
                    </form>
                </div>
            </div>
            <div class="auth-footer-part">
                <p class="text-center mb-0">
                    <?php if(@$general->copyright): ?>
                        <?php echo e(__(@$general->copyright)); ?>

                    <?php endif; ?>
                </p>
            </div>
        </div>
       
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        "use strict";

        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML =
                    "<span class='sp_text_danger'>@changeLang('Captcha field is required.')</span>";
                return false;
            }
            return true;
        }

        function verifyCaptcha() {
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(template().'layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\wahab\core\resources\views/theme4/user/auth/login.blade.php ENDPATH**/ ?>