

<?php $__env->startSection('title'); ?>
    Edit User
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa Thành viên</h1>
        </div>
    </div>
<div class="row">
    <form action="<?php echo e(route('admin.users.update',$user->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fas fa-user"></i> Sửa thành viên - </div>
                <div class="panel-body">
                    <div class="row justify-content-center" style="margin-bottom:40px">

                        <div class="col-md-8 col-lg-8 col-lg-offset-2">
                         
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" value="<?php echo e($user->email); ?>">
                                <?php echo ShowErrors($errors,'email'); ?>

                            </div>
                            <div class="form-group">
                                <label>password</label>
                                <input type="password" name="password" class="form-control" value="<?php echo e($user->password); ?>">
                                <?php echo ShowErrors($errors,'password'); ?>

                            </div>
                            <div class="form-group">
                                <label>Full name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo e($user->name); ?>">
                                <?php echo ShowErrors($errors,'name'); ?>

                            </div>
                                <label for="permission">Role</label>
                                <select class="form-control" name="roles" id="permission" value="">
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">                             
                                <button class="btn btn-success"  type="submit">Sửa thành viên</button>
                                <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-danger" type="reset">Huỷ bỏ</a>
                            </div>
                        </div>
                    </div>               
                    <div class="clearfix"></div>
                </div>
            </div>
    </div>
    </form>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Xampp\htdocs\VietproStore\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>