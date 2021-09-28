

<?php $__env->startSection('head'); ?>

    <title>ادمین | نمایش کامنت</title>
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
                            <h4 class="card-title">نظرات</h4>
                            <span><a href="<?php echo e(route('admin.comment.index')); ?>" class="btn
                                        btn-success">بازگشت</a></span>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">

                                <div class="row">
                                    <div class="col-md-12">
                                        <h2><?php echo e($comment->user()->value('first_name'). ' '.$comment->user()->value
                                        ('last_name')); ?></h2>
                                        <p><?php echo e($comment->comment); ?></p>
                                    </div>

                                    <div class="col-md-12 mt-4 pt-4 border-top">
                                        <form action="<?php echo e(route('admin.comment.answer', ['id'=>$comment->id])); ?>"
                                              method="post">
                                            <section class="form-group">
                                                <label for="comment">پاسخ</label>
                                                <textarea class="form-control " id="comment" rows="5" name="comment"
                                                          placeholder="پاسخ ..."></textarea>
                                            </section>
                                            <div class="col-md-6">
                                                <section class="form-group">
                                                    <button type="submit" class="btn btn-primary">ایجاد</button>
                                                </section>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Zero configuration table -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/saeed/Smart Electronics/Web/Amlak-slim4/resources/views/admin/comment/show.blade.php ENDPATH**/ ?>