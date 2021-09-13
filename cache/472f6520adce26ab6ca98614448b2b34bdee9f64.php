<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Slim4 tutorial</title>

    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-reboot.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <div>
        <h1 class="text-success p-3">
            Hello World of Blade Templates!
            <?php echo $__env->yieldContent('content'); ?>
        </h1>
    </div>


    <script src="<?php echo e(asset('js/bootstrap.bundle.min.js')); ?>"></script>
</body>
</html>
<?php /**PATH /home/saeed/Smart Electronics/Web/Amlak-slim4/resources/views/layouts/app.blade.php ENDPATH**/ ?>