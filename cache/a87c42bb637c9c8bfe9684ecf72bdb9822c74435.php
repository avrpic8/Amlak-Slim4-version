<?php $__env->startSection('head'); ?>

    <title>ادمین | پست ها</title>
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
                            <h4 class="card-title">اخبار</h4>
                            <span><a href="<?php echo e(route('admin.post.create')); ?>" class="btn btn-success">ایجاد</a></span>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">

                                <div class="">
                                    <table class="table zero-configuration">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>عنوان</th>
                                            <th>دسته</th>
                                            <th>نویسنده</th>
                                            <th>تصویر</th>
                                            <th style="min-width: 16rem; text-align: left;">تنظیمات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"><?php echo e($post->id); ?></td>
                                                <td><?php echo e($post->title); ?></td>
                                                <td><?php echo e($post->category()->value('name')); ?></td>
                                                <td><?php echo e($post->user()->value('first_name') . ' ' . $post->user()->value
                                                ('last_name')); ?></td>
                                                <td><img style="width: 90px;"
                                                         src="<?php echo e(asset($post->image)); ?>" alt="">
                                                </td>
                                                <td style="min-width: 16rem; text-align: left;">
                                                    <a href="<?php echo e(route('admin.post.edit', ['id'=> $post->id])); ?>"
                                                       class="btn btn-info waves-effect waves-light">ویرایش</a>
                                                    <form class="d-inline"
                                                          action="<?php echo e(route('admin.post.delete', ['id'=> $post->id])); ?>"
                                                          method="post">
                                                        <input type="hidden" name="_method" value="delete">
                                                        <button type="submit"
                                                                class="btn btn-danger waves-effect waves-light">حذف
                                                        </button>
                                                    </form>
                                                    <form class="d-inline"
                                                          action="<?php echo e(route('admin.post.status', ['id'=> $post->id])); ?>"
                                                          method="post">
                                                        <button type="submit"
                                                                class="btn waves-effect waves-light <?php echo e($post->status ? 'btn-success' : 'btn-warning'); ?>">
                                                            <?php echo e($post->status ? 'فعال' : 'غیرفعال'); ?>

                                                        </button>
                                                    </form>
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/saeed/Smart Electronics/Web/Amlak-slim4/resources/views/admin/post/index.blade.php ENDPATH**/ ?>