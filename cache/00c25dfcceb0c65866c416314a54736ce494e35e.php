<?php
use System\Auth\Auth;

?>
        <!doctype html>
<html lang="en">

<head>
    <?php echo $__env->make("admin.layouts.head", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent("head"); ?>
</head>

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="2-columns">

<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul></ul>
                </div>
                <ul class="nav navbar-nav float-right">

                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span
                                        class="user-name text-bold-600"><?= Auth::user()->first_name . ' ' . Auth::user()->last_name ?></span>
                                <span class="user-status active">آنلاین </span>
                            </div>
                            <span><img class="round" src="<?= asset(Auth::user()->avatar) ?>" alt="avatar" height="40"
                                       width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href=""><i class="feather icon-power"></i> خروج</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>


<?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">

        <?php echo $__env->yieldContent("content"); ?>;

    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<?php echo $__env->make("admin.layouts.scripts", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent("scripts"); ?>
</body>

</html><?php /**PATH /home/saeed/Smart Electronics/Web/Amlak-slim4/resources/views/admin/layouts/app.blade.php ENDPATH**/ ?>