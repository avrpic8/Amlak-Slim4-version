



<?php $__env->startSection('head'); ?>
    <title>کاربران | ویرایش</title>
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
                            <span><a href="<?= route("admin.user.index") ?>" class="btn btn-success">بازگشت</a></span>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">

                                <form class="row" action="<?= route("admin.user.update", ['id' => $user->id]) ?>" method="post" enctype="multipart/form-data">
                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <label for="first_name">نام</label>
                                            <input name="first_name" type="text" id="first_name"  value="<?= oldOrValue('first_name', $user->first_name) ?>" class="form-control <?= errorClass('first_name') ?>">
                                            <?= errorText('first_name') ?>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <label for="last_name">نام خانوادگی</label>
                                            <input name="last_name" type="text" id="last_name"  value="<?= oldOrValue('last_name', $user->last_name) ?>" class="form-control <?= errorClass('last_name') ?>">
                                            <?= errorText('last_name') ?>
                                        </fieldset>
                                    </div>
                                  

                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <label for="avatar">تصویر</label>
                                            <input name="avatar" type="file" id="avatar" class="form-control-file <?= errorClass('avatar') ?>">
                                            <?= errorText('avatar') ?>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-6">
                                        <section class="form-group">
                                            <button type="submit" class="btn btn-primary">ویرایش</button>
                                        </section>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/saeed/Smart Electronics/Web/Amlak-slim4/resources/views/admin/user/edit.blade.php ENDPATH**/ ?>