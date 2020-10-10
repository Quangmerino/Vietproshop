

<?php $__env->startSection('title'); ?>
	User
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">List User</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">List User</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">

					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								
								<a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-primary">Create User</a>
								
								
								<a href="<?php echo e(route('admin.roles.create')); ?>" class="btn btn-primary">Create Role</a>
								
								<a href="<?php echo e(route('admin.permissions.create')); ?>" class="btn btn-primary">Create Permission</a>
								<table class="table table-bordered" style="margin-top:20px;">

									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Name</th>
											<th>Email</th>
                                            <th>User Role</th>
											<th width='25%'>Operations</th>
										</tr>
									</thead>
									<tbody>
										<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e($user->id); ?></td>
											<td><?php echo e($user->name); ?></td>
											<td><?php echo e($user->email); ?></td>
											<td>   
											<?php if(!empty($user->getRoleNames())): ?>
                                                   <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      <label class="btn btn-success"><?php echo e($role); ?></label>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                               <?php endif; ?>
											<td>
												<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit-User')): ?>
												    <a href="<?php echo e(route('admin.users.edit',$user->id)); ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
												<?php endif; ?>

												<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete-User')): ?>
												    <a href="<?php echo e(route('admin.users.delete',$user->id)); ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
												<?php endif; ?>
											</td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
								</table>
								<div align='right'>
									<?php echo e($users->links()); ?>

								</div>
							</div>
							<div class="clearfix"></div>
						</div>

					</div>
				</div>
				<!--/.row-->


			</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Xampp\htdocs\VietproStore\resources\views/admin/users/index.blade.php ENDPATH**/ ?>