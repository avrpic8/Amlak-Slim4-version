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
                            <span><a href="#" class="btn btn-success">ایجاد</a></span>
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

                                        <tr role="row" class="odd">
                                            <td class="sorting_1">1</td>
                                            <td>ساخت یک میلیون مسکن از آرزو تا واقعیت</td>
                                            <td>اخبار مسکن</td>
                                            <td>رامین فرامرزی</td>
                                            <td><img style="width: 90px;" src="../admin-assets/images/elements/apple-watch.png" alt=""></td>
                                            <td style="min-width: 16rem; text-align: left;">
                                                <a href="#" class="btn btn-info waves-effect waves-light">ویرایش</a>
                                                <form class="d-inline" action="#" method="post">
                                                    <input type="hidden" name="_method" value="delete">
                                                    <button type="submit" class="btn btn-danger waves-effect waves-light">حذف</button>
                                                </form>
                                            </td>
                                        </tr>

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