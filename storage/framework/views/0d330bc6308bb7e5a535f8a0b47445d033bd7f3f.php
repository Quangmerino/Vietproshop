
<?php $__env->startSection('title'); ?>
	Detail
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
		<!-- main -->
		<div class="colorlib-shop">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-md-10 col-md-offset-1">
						<div class="product-detail-wrap">
							<div class="row">
								<div class="col-md-5">
									<div class="product-entry">
										<div class="product-img" style="background-image: url(/uploads/<?php echo e($products->image); ?>);">
											
										</div>

									</div>
								</div>
								<div class="col-md-7">
									<form action="<?php echo e(route('carts.addCart')); ?>" method="get">
										<div class="desc">
											<h3><?php echo e($products->name); ?></h3>
											<input type="hidden" name="name" value="<?php echo e($products->name); ?>">
											<input type="hidden" name="code" value="<?php echo e($products->code); ?>">
											<input type="hidden" name="image" value="<?php echo e($products->image); ?>">	
											<p class="price">
												<span><?php echo e(number_format($products->price,0,'','.')); ?> đ</span>
												<input type="hidden" name="price" value="<?php echo e($products->price); ?>">
											</p>
											<p><?php echo e($products->info); ?></p>
											<p style="text-align: justify;">
												<?php echo e($products->description); ?>

											</p>
											<div class="row row-pb-sm">
												<div class="col-md-4">
													<div class="input-group">
														<span class="input-group-btn">
															<button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
																<i class="icon-minus2"></i>
															</button>
														</span>
														<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
														<span class="input-group-btn">
															<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
																<i class="icon-plus2"></i>
															</button>
														</span>
													</div>
												</div>
											</div>
											<input type="hidden" name="id_product" value="<?php echo e($products->id); ?>">
											<p><button class="btn btn-primary btn-addtocart" type="submit"> Thêm vào giỏ hàng</button></p>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="row">
							<div class="col-md-12 tabulation">
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#description">Mô tả</a></li>
								</ul>
								<div class="tab-content">
									<div id="description" class="tab-pane fade in active">
										<?php echo e($products->description); ?>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Sản phẩm Mới</span></h2>
					</div>
				</div>
				<div class="row">
					<?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-md-3 text-center">
							<div class="product-entry">
								<div class="product-img" style="background-image: url(/uploads/<?php echo e($new->img); ?>);">
									<div class="cart">
										<p>
											<span class="addtocart"><a href="cart.html"><i
														class="icon-shopping-cart"></i></a></span>
											<span><a href="<?php echo e(route('products.detail',['slugproduct'=> $new->slug])); ?>"><i class="icon-eye"></i></a></span>


										</p>
									</div>
								</div>
								<div class="desc">
									<h3><a href="<?php echo e(route('products.detail',['slugproduct'=> $new->slug])); ?>"><?php echo e($new->name); ?></a></h3>
									<p class="price"><span><?php echo e(number_format($new->price,0,'','.')); ?> đ</span></p>
								</div>
							</div>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</div>
		<!-- end main -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
	<script>
		var quantity=1;
		$('.quantity-right-plus').click(function () {
			var quantity = parseInt($('#quantity').val());
			$('#quantity').val(quantity + 1);
		});

		$('.quantity-left-minus').click(function (e) {
			var quantity = parseInt($('#quantity').val());
				if (quantity > 1) {
					$('#quantity').val(quantity - 1);
				}
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Xampp\htdocs\VietproStore\resources\views/client/products/detail.blade.php ENDPATH**/ ?>