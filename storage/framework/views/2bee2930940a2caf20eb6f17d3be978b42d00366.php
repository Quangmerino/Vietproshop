

<?php $__env->startSection('title'); ?>
	Order
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
			<div class="row">
				<ol class="breadcrumb">
					<li><a href="#"><svg class="glyph stroked home">
								<use xlink:href="#stroked-home"></use>
							</svg></a></li>
					<li class="active">Đơn hàng</li>
				</ol>
			</div>
			<div class="row">
				<div class="col-xs-12 col-md-12 col-lg-12">
					<div class="panel panel-primary">
						<div class="panel-heading">Danh sách đơn đặt hàng chưa xử lý</div>
						<div class="panel-body">
							<div class="bootstrap-table">
								<div class="table-responsive">
									<a href="<?php echo e(route('admin.orders.process')); ?>" class="btn btn-success">Đơn đã xử lý</a>
									<table class="table table-bordered" style="margin-top:20px;">
										<thead>
											<tr class="bg-primary">
												<th>ID</th>
												<th>Tên khách hàng</th>
												<th>Sđt</th>
												<th>Địa chỉ</th>
	
												<th>Xử lý</th>
											</tr>
										</thead> 
										<tbody>
											<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($order->id); ?></td>
												<td><?php echo e($order->name); ?></td>
												<td><?php echo e($order->phone); ?></td>
												<td><?php echo e($order->address); ?></td>
												<td>
													<a href="<?php echo e(route('admin.orders.detail',$order->id)); ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>Xử lý</a>
	
												</td>
											</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="clearfix"></div>
							<div align="right">
								<?php echo e($orders->links()); ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Xampp\htdocs\VietproStore\resources\views/admin/orders/order.blade.php ENDPATH**/ ?>