



<?php $__env->startSection('head'); ?>
    <title>ادمین | کاربران</title>
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
                            <h4 class="card-title">کاربران</h4>
                            <span><a href="#" class="btn btn-success disabled">ایجاد</a></span>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">

                                <div class="">
                                    <table class="table zero-configuration">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ایمیل</th>
                                            <th>نام</th>
                                            <th>نام خانوادگی</th>
                                            <th>تصویر</th>
                                            <th>وضعیت</th>
                                            <th style="width: 22rem; text-align: left;">تنظیمات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?= $user->id ?></td>
                                            <td><?= $user->email ?></td>
                                            <td><?= $user->first_name ?></td>
                                            <td><?= $user->last_name ?></td>
                                            <td><img src="<?= asset($user->avatar) ?>" alt=""></td>
                                            <td><?= $user->is_active == 1 ? '<span class="text-success">فعال</span>' : '<span class="text-danger">غیرفعال</span>' ?></td>
                                            <td style="width: 22rem; text-align: left;">
                                                <a href="<?= route('admin.user.edit', ['id' => $user->id]) ?>"
                                                   class="btn btn-info">ویرایش</a>
                                                <a href="<?= route('admin.user.change.status', ['id' => $user->id]) ?>"
                                                   class="btn btn-warning">تغییر وضعیت</a>
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/saeed/Smart Electronics/Web/Amlak-slim4/resources/views/admin/user/index.blade.php ENDPATH**/ ?>