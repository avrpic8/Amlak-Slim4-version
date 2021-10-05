<?php $__env->startSection('head'); ?>
    <title>ادمین | آگهی</title>
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
                            <h4 class="card-title">آگهی</h4>
                            <span><a href="<?php echo e(route("admin.ads.create")); ?>" class="btn btn-success">ایجاد</a></span>
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
                                            <th>آدرس</th>
                                            <th>تصویر</th>
                                            <th>مشخصات</th>
                                            <th>تگ</th>
                                            <th>کاربر</th>
                                            <th style="width: 22rem;">تنظیمات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $advertise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($advertise->id); ?></td>
                                                <td><?php echo e($advertise->title); ?></td>
                                                <td><?php echo e($advertise->category()->value('name')); ?></td>
                                                <td><?php echo e($advertise->address); ?></td>
                                                <td><img style="width: 90px;" src="<?php echo e(asset($advertise->image)); ?>" alt="">
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>floor : <?php echo e($advertise->floor); ?></li>
                                                        <li>year : <?php echo e($advertise->year); ?></li>
                                                        <li>storeroom : <?php echo e($advertise->storeroom); ?></li>
                                                        <li>balcony : <?php echo e($advertise->balcony); ?></li>
                                                        <li>area : <?php echo e($advertise->area); ?></li>
                                                        <li>room : <?php echo e($advertise->room); ?></li>
                                                        <li>toilet : <?php echo e($advertise->toilet); ?></li>
                                                        <li>parking : <?php echo e($advertise->parking); ?></li>
                                                    </ul>
                                                </td>
                                                <td><?php echo e($advertise->tag); ?></td>
                                                <td><?php echo e($advertise->user()->value('first_name') . ' ' . $advertise->user()->value('last_name')); ?></td>
                                                <td style="width: 22rem;">
                                                    <a href="<?php echo e(route('admin.ads.gallery', ['id' => $advertise->id])); ?>"
                                                       class="btn btn-warning">گالری</a>
                                                    <a href="<?php echo e(route('admin.ads.edit', ['id' => $advertise->id])); ?>"
                                                       class="btn btn-info">ویرایش</a>
                                                    <form class="d-inline"
                                                          action="<?php echo e(route('admin.ads.delete', ['id' => $advertise->id])); ?>"
                                                          method="post">
                                                        <input type="hidden" name="_method" value="delete">
                                                        <button type="submit" class="btn btn-danger">حذف</button>
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/saeed/Smart Electronics/Web/Amlak-slim4/resources/views/admin/ads/index.blade.php ENDPATH**/ ?>