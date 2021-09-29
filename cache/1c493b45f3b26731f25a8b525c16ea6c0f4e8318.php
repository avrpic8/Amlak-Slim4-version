



<?php $__env->startSection('head'); ?>
    <title>کاربران | ویرایش</title>
    <link rel="stylesheet" href="<?php echo e(asset('admin-assets/css/plugins/filepond.css')); ?>">
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
                                        <section class="form-group">
                                            <button type="submit" class="btn btn-primary">ویرایش</button>
                                        </section>
                                    </div>
                                </form>

                                <div class="col-md-6">
                                    <fieldset class="form-group">
                                        <label for="avatar">تصویر</label>
                                        <input multiple data-max-file-size="5MB" name="avatar" type="file" id="avatar"
                                               class="form-control-file <?= errorClass('avatar') ?>">
                                        <?= errorText('avatar') ?>
                                    </fieldset>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script src="<?php echo e(asset('admin-assets/js/scripts/filepond.js')); ?>"></script>

    <script>


        // const inputElement = FilePond.create(document.querySelector('input[id="avatar"]'));
        // const pond = FilePond.create(inputElement);
        //
        // FilePond.setOptions({
        //
        //    server: '/upload'
        // });

        // Set default FilePond options
        FilePond.setOptions({
            // upload to this server end point
            server: {

                process:(fieldName, file, metadata, load, error, progress, abort, transfer, options) => {

                    // fieldName is the name of the input field
                    // file is the actual file object to send
                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);

                    const request = new XMLHttpRequest();
                    request.open('POST', '/upload');

                    // Should call the progress method to update the progress to 100% before calling load
                    // Setting computable to false switches the loading indicator to infinite mode
                    request.upload.onprogress = (e) => {
                        progress(e.lengthComputable, e.loaded, e.total);
                    };

                    // Should call the load method when done and pass the returned server file id
                    // this server file id is then used later on when reverting or restoring a file
                    // so your server knows which file to return without exposing that info to the client
                    request.onload = function () {
                        if (request.status >= 200 && request.status < 300) {
                            // the load method accepts either a string (id) or an object
                            load(request.responseText);
                        } else {
                            // Can call the error method if something is wrong, should exit after
                            error('oh no');
                        }
                    };

                    request.send(formData);
                },
                //revert: 'filepond/revert',
                //restore: 'filepond/restore?id=',
                //fetch: 'upload/fetch?data=',
                //load: 'filepond/load',
                //fetch: 'filepond/fetch'
            },
        });

        const pond = FilePond.create(document.querySelector('input[id="avatar"]'));

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/saeed/Smart Electronics/Web/Amlak-slim4/resources/views/admin/user/edit.blade.php ENDPATH**/ ?>