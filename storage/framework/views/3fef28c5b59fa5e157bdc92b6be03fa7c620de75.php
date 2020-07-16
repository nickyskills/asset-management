<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('global.change_password')); ?>

                </div>
                <div class="panel-body">
                    <form method="POST" action="<?php echo e(route("profile.password.update")); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                            <label class="required" for="email"><?php echo e(trans('cruds.user.fields.email')); ?></label>
                            <input class="form-control" type="email" name="email" id="email" value="<?php echo e(old('email', auth()->user()->email)); ?>" required>
                            <?php if($errors->has('email')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('email')); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                            <label class="required" for="password">New <?php echo e(trans('cruds.user.fields.password')); ?></label>
                            <input class="form-control" type="password" name="password" id="password" required>
                            <?php if($errors->has('password')): ?>
                                <span class="help-block" role="alert"><?php echo e($errors->first('password')); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label class="required" for="password_confirmation">Repeat New <?php echo e(trans('cruds.user.fields.password')); ?></label>
                            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" required>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\07072020\rose\resources\views/auth/passwords/edit.blade.php ENDPATH**/ ?>