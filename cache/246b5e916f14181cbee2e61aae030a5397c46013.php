<?php $__env->startSection('head'); ?>

    <title>ادمین | ویرایش دسته بندی</title>

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
                            <span><a href="<?= route('admin.category.index')?>" class="btn
                            btn-success">بازگشت</a></span>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">

                                <form class="row" action="<?= route('admin.category.update', ['id' => $category->id])?>"
                                      method="post"
                                      enctype="multipart/form-data">
                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <label for="helperText">نام دسته</label>
                                            <input value="<?= oldOrValue('name', $category->name)?>" name="name"
                                                   type="text"
                                                   id="helperText"
                                                   class="form-control <?= errorClass('name')?>" placeholder="نام ...">
                                            <?= errorText('name')?>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <div class="form-group">
                                                <label for="helperText">دسته والد</label>
                                                <select name="parent_id" class="select2 form-control <?= errorClass('parent_id')?>">
                                                    <option value="">درصورت وجود والد انتخاب شود</option>
                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?= $category->id ?>" <?= oldOrValue
                                                        ('parent_id', $category->parent_id) == $category->id ? 'selected' : '' ?>><?= $category->name ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <?= errorText('parent_id')?>
                                        </fieldset>
                                    </div>

                                    <div class="col-md-6">
                                        <fieldset class="form-group">
                                            <button type="submit" class="btn btn-primary">ایجاد</button>
                                        </fieldset>
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/saeed/Smart Electronics/Web/Amlak-slim4/resources/views/admin/category/edit.blade.php ENDPATH**/ ?>