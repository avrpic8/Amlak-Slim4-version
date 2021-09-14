<?php $__env->startSection('head'); ?>
    <title>Admin</title>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="content-body">
        <section id="dashboard-analytics">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-analytics text-white">
                        <div class="card-content">
                            <div class="card-body text-center">
                                <img src="admin-assets/images/elements/decore-left.png" class="img-left" alt=" card-img-left">
                                <img src="admin-assets/images/elements/decore-right.png" class="img-right" alt=" card-img-right">
                                <div class="avatar avatar-xl bg-primary shadow mt-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-award white font-large-1"></i>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h1 class="text-white">دوره آموزش MVC پیشرفته</h1>
                                    <ul class="list-unstyled mt-2 text-white">
                                        <li>
                                            <h3>Model</h3>
                                        </li>
                                        <li>
                                            <h3>View</h3>
                                        </li>
                                        <li>
                                            <h3>Controller</h3>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/saeed/Smart Electronics/Web/Amlak-slim4/resources/views/admin/index.blade.php ENDPATH**/ ?>