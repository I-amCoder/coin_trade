<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="shortcut icon" type="image/png" href="<?php echo e(getFile('icon', @$general->favicon)); ?>">

    <title>
        <?php if(@$general->sitename): ?>
            <?php echo e(__(@$general->sitename) . '-'); ?>

        <?php endif; ?>
        <?php echo e(__(@$pageTitle)); ?>

    </title>


    <link rel="stylesheet" href="<?php echo e(asset('asset/theme1/frontend/css/cookie.css')); ?>">
    <link href="<?php echo e(asset('asset/theme1/frontend/img/apple-touch-icon.png')); ?>" rel="apple-touch-icon">
    <link href="<?php echo e(asset('asset/theme1/frontend/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('asset/theme1/frontend/vendor/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('asset/theme1/frontend/vendor/boxicons/css/boxicons.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('asset/theme1/frontend/vendor/glightbox/css/glightbox.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('asset/theme1/frontend/vendor/remixicon/remixicon.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('asset/theme1/frontend/vendor/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('asset/theme1/frontend/css/selectric.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/theme1/frontend/css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/theme1/frontend/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/theme1/frontend/css/font-awsome.min.css')); ?>">
    <link href="<?php echo e(asset('asset/theme1/frontend/css/style.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('asset/theme1/frontend/css/iziToast.min.css')); ?>">
    <style></style>
    <?php echo $__env->yieldPushContent('style'); ?>

    <link rel="stylesheet"
        href="<?php echo e(asset('asset/theme1/frontend/css/color.php?primary_color=' . str_replace('#', '', @$general->primary_color))); ?>">
</head>


<body>

    <?php if(@$general->preloader_status): ?>
        <div id="preloader"></div>
    <?php endif; ?>


    <?php if(@$general->allow_modal): ?>
        <?php echo $__env->make('cookieConsent::index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>


    <?php if(@$general->analytics_status): ?>
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo e(@$general->analytics_key); ?>"></script>
        <script>
            'use strict'
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag("js", new Date());
            gtag("config", "<?php echo e(@$general->analytics_key); ?>");
        </script>
    <?php endif; ?>
    <main id="main" class="main-img">

        <?php echo $__env->yieldContent('content'); ?>

    </main>

   

    <button type="button" class="sp_btn sp_btn_warning  btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up text-light"></i>
    </button>

    <script src="<?php echo e(asset('asset/theme1/frontend/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/theme1/frontend/vendor/purecounter/purecounter.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/theme1/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/theme1/frontend/vendor/glightbox/js/glightbox.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/theme1/frontend/js/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/theme1/frontend/vendor/php-email-form/validate.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/theme1/frontend/js/selectric.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/theme1/frontend/js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/theme1/frontend/js/iziToast.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/theme1/frontend/js/jquery.uploadPreview.min.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('script'); ?>
    <?php if(@$general->twak_allow): ?>
        <script type="text/javascript">
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = "https://embed.tawk.to/<?php echo e(@$general->twak_key); ?>";
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
    <?php endif; ?>



    <?php if(Session::has('error')): ?>
        <script>
            "use strict";
            iziToast.error({
                message: "<?php echo e(session('error')); ?>",
                position: 'topRight'
            });
        </script>
    <?php endif; ?>

    <?php if(Session::has('success')): ?>
        <script>
            "use strict";
            iziToast.success({
                message: "<?php echo e(session('success')); ?>",
                position: 'topRight'
            });
        </script>
    <?php endif; ?>

    <?php if(session()->has('notify')): ?>
        <?php $__currentLoopData = session('notify'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <script>
                "use strict";
                iziToast.<?php echo e($msg[0]); ?>({
                    message: "<?php echo e(trans($msg[1])); ?>",
                    position: "topRight"
                });
            </script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php if(@$errors->any()): ?>
        <script>
            "use strict";
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                iziToast.error({
                message: "<?php echo e(__($error)); ?>",
                position: "topRight"
                });
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </script>
    <?php endif; ?>


    <script>
        'use strict';
        


        $(document).ready(function() {
            $('#trial_subscribe').on('click', function(e) {

                e.preventDefault();
                var email = $('#trial_email').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: 'POST',
                    url: "<?php echo e(route('subscribe')); ?>",
                    data: {
                        email: email
                    },
                    success: function(response) {

                        if (response.fails) {
                            notify('error', response.errorMsg.email)

                        }

                        if (response.success) {
                            $('#email').val('');
                            notify('success', response.successMsg)

                        }
                    }
                });
            })


        });
    </script>


    <script>
        'use strict'
        var url = "<?php echo e(route('user.changeLang')); ?>";

        $(".changeLang").change(function() {
            if ($(this).val() == '') {
                return false;
            }
            window.location.href = url + "?lang=" + $(this).val();
        });
        //Get the button
        let mybutton = document.getElementById("btn-back-to-top");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 20
            ) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        mybutton.addEventListener("click", backToTop);

        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>


</body>


</html>
<?php /**PATH /home/u272239730/domains/bitcoingoldtrading.com/public_html/trade/core/resources/views/frontend/layout/auth.blade.php ENDPATH**/ ?>