

<?php $__env->startSection('title'); ?>
	List Permission
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home">
							<use xlink:href="#stroked-home"></use>
						</svg></a></li>
				<li class="active">List Permission</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">List Permission</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">

				<div class="panel panel-primary">

					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="<?php echo e(route('admin.permissions.create')); ?>" class="btn btn-primary">Create Permission</a>
								<table class="table table-bordered" style="margin-top:20px;">

									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th>Name</th>
											<th width='25%'>Operations</th>
										</tr>
									</thead>
									<tbody>
										<?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e($permission->id); ?></td>
											<td><?php echo e($permission->name); ?></td>
											<td>
												<a href="<?php echo e(route('admin.permissions.edit',$permission->id)); ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
												<a href="<?php echo e(route('admin.permissions.delete',$permission->id)); ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
											</td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
								</table>
								<div align='right'>
									<?php echo e($permissions->links()); ?>

								</div>
							</div>
							<div class="clearfix"></div>
						</div>

					</div>
				</div>
				<!--/.row-->


			</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Xampp\htdocs\VietproStore\resources\views/admin/permissions/index.blade.php ENDPATH**/ ?>