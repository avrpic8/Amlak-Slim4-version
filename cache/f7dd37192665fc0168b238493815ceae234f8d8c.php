<?php $__env->startSection('head'); ?>
    <title>ادمین | ویرایش خبر </title>
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
                            <h4 class="card-title">پست</h4>
                            <span><a href="<?php echo e(route('admin.post.index')); ?>" class="btn btn-success">بازگشت</a></span>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">

                                <form class="row" action="<?php echo e(route('admin.post.update', ['id' => $post->id])); ?>"
                                      method="post"
                                      enctype="multipart/form-data">

                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <label for="title">عنوان</label>
                                            <input value="<?php echo e(oldOrValue('title', $post->title)); ?>" name="title"
                                                   type="text"
                                                   id="title"
                                                   class="form-control <?= errorClass('title')?>"
                                                   placeholder="نام ...">
                                            <?= errorText('title')?>
                                        </fieldset>
                                    </div>


                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <label for="published_at">تاریخ انتشار</label>
                                            <input value="<?php echo e(oldOrValue('published_at', date( "Y-m-d",strtotime($post->published_at)))); ?>"
                                                   name="published_at" type="date"
                                                   id="published_at"
                                                   class="form-control <?= errorClass('published_at')?>">
                                            <?= errorText('published_at')?>
                                        </fieldset>
                                    </div>


                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <label for="image">تصویر</label>
                                            <input name="image" type="file" id="image"
                                                   class="form-control-file <?= errorClass('image')?> ">
                                            <img src="<?php echo e(asset($post->image)); ?>" alt="" width="200" height="150" class="mt-4">
                                            <?= errorText('image')?>
                                        </fieldset>
                                    </div>


                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <div class="form-group">
                                                <label for="cat_id">دسته</label>
                                                <select name="cat_id"
                                                        class="select2 form-control <?= errorClass('cat_id')?>">
                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($category->id); ?>" <?php echo e(!empty(old('cat_id')) &&
                                                        $category->id === old('cat_id') ? 'selected' : ''); ?>>
                                                            <?php echo e($category->name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <?= errorText('cat_id')?>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-12">
                                        <section class="form-group">
                                            <label for="body">متن</label>
                                            <textarea class="form-control <?= errorClass('body')?>" id="body" rows="5"
                                                      name="body"
                                                      placeholder="متن ...">
                                                <?php echo e($post->body); ?>

                                            </textarea>
                                            <?= errorText('body')?>
                                        </section>
                                    </div>

                                    <div class="col-md-6">
                                        <section class="form-group">
                                            <button type="submit" class="btn btn-primary">ایجاد</button>
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


<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>
    <script>
        CKEDITOR.replace('body');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/saeed/Smart Electronics/Web/Amlak-slim4/resources/views/admin/post/edit.blade.php ENDPATH**/ ?>