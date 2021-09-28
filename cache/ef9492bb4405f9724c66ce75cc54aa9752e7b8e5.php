

<?php $__env->startSection('head'); ?>

    <title>ادمین | کامنت</title>
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
                            <span><a href="#" class="btn btn-success disabled">ایجاد</a></span>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">

                                <div class="">
                                    <table class="table zero-configuration">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>کاربر</th>
                                            <th>نظر</th>
                                            <th>وضعیت</th>
                                            <th>تنظیمات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"><?php echo e($comment->id); ?></td>
                                                <td><?php echo e($comment->user()->value('first_name') .' '. $comment->user()->value('last_name')); ?></td>
                                                <td><?php echo e($comment->comment); ?></td>
                                                <td><?= $comment->approved == 0 ? '<span class="text-danger">در انتظار تایید</span>' : '<span class="text-success">تایید شده</class>' ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('admin.comment.show', ['id'=> $comment->id])); ?>"
                                                       class="btn btn-success waves-effect waves-light">نمایش</a>
                                                    <?php if($comment->approved == 0): ?>
                                                        <a href="<?= route('admin.comment.approved', ['id'=>
                                                            $comment->id]) ?>" class="btn btn-warning">تائید</a>
                                                    <?php endif; ?>
                                                    <?php if($comment->approved == 1): ?>
                                                        <a href="<?= route('admin.comment.approved', ['id'=>$comment->id]) ?>" class="btn btn-danger">لغو تایید</a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/saeed/Smart Electronics/Web/Amlak-slim4/resources/views/admin/comment/index.blade.php ENDPATH**/ ?>