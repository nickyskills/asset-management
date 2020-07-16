<?php $__env->startSection('content'); ?>
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('global.create')); ?> <?php echo e(trans('cruds.branch.title_singular')); ?>

                </div>
                <div class="panel-body">
                    <form method="POST" action="<?php echo e(route("admin.branches.store")); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                            <label for="name"><?php echo e(trans('cruds.branch.fields.name')); ?></label>
                            <input class="form-control" type="text" name="name" id="name" value="<?php echo e(old('name', '')); ?>">
                            <?php if($errors->has('name')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('name')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.branch.fields.name_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('address') ? 'has-error' : ''); ?>">
                            <label for="address"><?php echo e(trans('cruds.branch.fields.address')); ?></label>
                            <input class="form-control" type="text" name="address" id="address" value="<?php echo e(old('address', '')); ?>">
                            <?php if($errors->has('address')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('address')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.branch.fields.address_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('contact_person') ? 'has-error' : ''); ?>">
                            <label for="contact_person"><?php echo e(trans('cruds.branch.fields.contact_person')); ?></label>
                            <input class="form-control" type="text" name="contact_person" id="contact_person" value="<?php echo e(old('contact_person', '')); ?>">
                            <?php if($errors->has('contact_person')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('contact_person')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.branch.fields.contact_person_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('department') ? 'has-error' : ''); ?>">
                            <label for="department"><?php echo e(trans('cruds.branch.fields.department')); ?></label>
                            <input class="form-control" type="text" name="department" id="department" value="<?php echo e(old('department', '')); ?>">
                            <?php if($errors->has('department')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('department')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.branch.fields.department_helper')); ?></span>
                        </div>
                        <div class="form-group <?php echo e($errors->has('zone') ? 'has-error' : ''); ?>">
                            <label for="zone"><?php echo e(trans('cruds.branch.fields.zone')); ?></label>
                            <input class="form-control" type="text" name="zone" id="zone" value="<?php echo e(old('zone', '')); ?>">
                            <?php if($errors->has('zone')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('zone')); ?></span>
                            <?php endif; ?>
                            <span class="help-block"><?php echo e(trans('cruds.branch.fields.zone_helper')); ?></span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                <?php echo e(trans('global.save')); ?>

                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\07072020\rose\resources\views/admin/branches/create.blade.php ENDPATH**/ ?>