<?php
$content = content('blog.content');
$blogs = element('blog.element')->take(2);
?>

<section class="blog-section sp_pt_120 sp_pb_120">
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 text-center">
            <div class="sp_site_header  wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
              <h2 class="sp_site_title"><?php echo e(__(@$content->data->title)); ?></h2>
            </div>
          </div>
        </div>
        <div class="row gy-4">
            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $comment = App\Models\Comment::where('blog_id', $blog->id)->count();
                ?>
                <div class="col-md-6 col-lg-6">
                    <div class="blog-item blog-list-style">
                        <div class="blog-thumb">
                            <img src="<?php echo e(getFile('blog', @$blog->data->image)); ?>" alt="blog thumb">
                        </div>
                        <div class="blog-content">
                            <h4 class="blog-title mt-0"><a href="<?php echo e(route('blog', [@$blog->id, Str::slug(@$blog->data->title)])); ?>"><?php echo e(@$blog->data->title); ?></a></h4>
                            <ul class="blog-meta mt-2">
                                <li><i class="fas fa-clock"></i> <?php echo e(@$blog->created_at->diffforhumans()); ?></li>
                                <li><i class="fas fa-comment"></i> <?php echo e($comment); ?> <?php echo e(__('comments')); ?></li>
                            </ul>

                            <p class="mt-3"><?php echo e(@$blog->data->short_description); ?></p>
                            
                            <a href="<?php echo e(route('blog', [@$blog->id, Str::slug(@$blog->data->title)])); ?>" class="blog-btn">
                                <span><?php echo e(__('Read More')); ?></span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH /home/u272239730/domains/bitcoingoldtrading.com/public_html/trade/core/resources/views/theme4/sections/blog.blade.php ENDPATH**/ ?>