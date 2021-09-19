<?php $__env->startSection('head'); ?>
    <title>ادمین | دسته بندی ها</title>
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
                            <h4 class="card-title">دسته بندی</h4>
                            <span><a href="<?= route('admin.category.create')?>" class="btn
                            btn-success">ایجاد</a></span>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">

                                <div class="">
                                    <table class="table zero-configuration">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>نام</th>
                                            <th>دسته والد</th>
                                            <th style="min-width: 6rem; text-align: left;">تنظیمات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1"><?php echo e($category->id); ?></td>
                                            <td><?php echo e($category->name); ?></td>
                                            <td><?php echo e($category->parent_id); ?></td>
                                            <td style="min-width: 6rem; text-align: left;">
                                                <a href="<?= route('admin.category.edit', ['id'=> $category->id])?>"
                                                   class="btn btn-info
                                                waves-effect
                                                waves-light">ویرایش</a>
                                                <form class="d-inline" action="<?= route('admin.category.delete', ['id'=> $category->id])?>"
                                                      method="post">
                                                    <input type="hidden" name="_method" value="delete">
                                                    <button type="submit" class="btn btn-danger waves-effect waves-light">حذف</button>
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/saeed/Smart Electronics/Web/Amlak-slim4/resources/views/admin/category/index.blade.php ENDPATH**/ ?>