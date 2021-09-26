<?php $__env->startSection('head'); ?>
    <title>ادمین | گالری</title>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="content-header row">

    </div>
    <div class="content-body">

        <!-- Zero configuration table -->
        <section id="basic-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">آگهی - گالری</h4>
                            <span><a href="<?php echo e(route('admin.ads.index')); ?>" class="btn btn-success">بازگشت</a></span>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">

                                <form class="row"
                                      action="<?php echo e(route('admin.ads.store.gallery.image', ['id' => $advertise->id])); ?>"
                                      method="post"
                                      enctype="multipart/form-data">

                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <label for="image">تصویر</label>
                                            <input name="image" type="file" id="image" class="form-control-file">
                                            <?=errorText('image')?>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-12">
                                        <section class="form-group">
                                            <button type="submit" class="btn btn-primary">آپلود تصویر</button>
                                        </section>
                                    </div>
                                </form>
                                <div class="col-md-12 mt-4 pt-4">
                                    <div class="row">
                                        <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-3 text-center">
                                                <div><img style="width: 100%;" src="<?php echo e(asset($gallery->image)); ?>" alt="">
                                                </div>
                                                <a class="btn btn-danger my-1" href="<?php echo e(route('admin.ads.delete.gallery.image', ['id'=>$gallery->id])); ?>">حذف</a>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/saeed/Smart Electronics/Web/Amlak-slim4/resources/views/admin/ads/gallery.blade.php ENDPATH**/ ?>