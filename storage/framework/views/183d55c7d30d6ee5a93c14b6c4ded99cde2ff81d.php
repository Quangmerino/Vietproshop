

<?php $__env->startSection('title'); ?>
    Edit Role
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Role</h1>
        </div>
    </div>
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fas fa-user"></i> Edit Role </div>
                <form action="<?php echo e(route('admin.roles.update',$role->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="panel-body">
                        <div class="row justify-content-center" style="margin-bottom:40px">
    
                            <div class="col-md-8 col-lg-8 col-lg-offset-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo e($role->name); ?>">
                                </div>                         
                            </div>
                            <div class="col-md-8 col-lg-8 col-lg-offset-2">
                                <label for="permission">Permission</label>
                                <select class="form-control" name="permission" id="permission" multiple>
                                    <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">
                                    <button class="btn btn-success"  type="submit">Edit Role</button>
                                    <a href="#" class="btn btn-danger" type="reset">Quit</a>
                                </div>
                            </div>
                        </div> 
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>

    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Xampp\htdocs\VietproStore\resources\views/admin/roles/edit.blade.php ENDPATH**/ ?>