<?php $__env->startSection('title'); ?>
	Cart
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="colorlib-shop">
	<div class="container">
		<div class="row row-pb-md">
			<div class="col-md-10 col-md-offset-1">
				<div class="process-wrap">
					<div class="process text-center active">
						<p><span>01</span></p>
						<h3>Giỏ hàng</h3>
					</div>
					<div class="process text-center">
						<p><span>02</span></p>
						<h3>Thanh toán</h3>
					</div>
					<div class="process text-center">
						<p><span>03</span></p>
						<h3>Hoàn tất thanh toán</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="row row-pb-md">
			<div class="col-md-10 col-md-offset-1">
				<div class="product-name">
					<div class="one-forth text-center">
						<span>Chi tiết sản phẩm</span>
					</div>
					<div class="one-eight text-center">
						<span>Giá</span>
					</div>
					<div class="one-eight text-center">
						<span>Số lượng</span>
					</div>
					<div class="one-eight text-center">
						<span>Tổng</span>
					</div>
					<div class="one-eight text-center">
						<span>Xóa</span>
					</div>
				</div>

				<?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="product-cart">
					<div class="one-forth">
						<div class="product-img">
						    <img class="img-thumbnail cart-img" src="/uploads/<?php echo e($cart->options->image); ?>">
						</div>
						<div class="detail-buy">
							<h4>Mã : <?php echo e($cart->id); ?></h4>
							<h5><?php echo e($cart->name); ?></h5>
						</div>
					</div>
					<div class="one-eight text-center">
						<div class="display-tc">
							<span class="price"><?php echo e(number_format($cart->price,0,'','.')); ?> đ</span>
						</div>
					</div>
					<div class="one-eight text-center">
						<div class="display-tc">
							<input onchange="updateCart('<?php echo e($cart->rowId); ?>',this.value)" type="number" id="quantity" name="quantity"
								class="form-control input-number text-center" value="<?php echo e($cart->qty); ?>">
						</div>
					</div>
					<div class="one-eight text-center">
						<div class="display-tc">
							<span class="price"><?php echo e(number_format($cart->price*$cart->qty,0,'','.')); ?> đ</span>
						</div>
					</div>
					<div class="one-eight text-center">
						<div class="display-tc">
							<a onclick="return delete_cart(' <?php echo e($cart->name); ?> ')" href="/carts/delete/<?php echo e($cart->rowId); ?>" class="closed"></a>
						</div>
					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="total-wrap">
					<div class="row">
						<div class="col-md-8">

						</div>
						<div class="col-md-3 col-md-push-1 text-center">
							<div class="total">
								<div class="sub">
									<p><span>Tổng:</span> <span><?php echo e($total); ?> đ</span></p>
								</div>
								<div class="grand-total">
									<p><span><strong>Tổng cộng:</strong></span> <span><?php echo e($total); ?> đ</span></p>
									<a href="<?php echo e(route('carts.checkout')); ?>" class="btn btn-primary">Thanh toán <i
											class="icon-arrow-right-circle"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
<script>
	$(document).ready(function () {

		var quantitiy = 0;
		$('.quantity-right-plus').click(function (e) {

			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());

			// If is not undefined

			$('#quantity').val(quantity + 1);


			// Increment

		});

		$('.quantity-left-minus').click(function (e) {
			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());

			if (quantity > 0) {
				$('#quantity').val(quantity - 1);
			}
		});

	});
</script>
<script>
      function updateCart(rowId,qty) 
	  { 
		  $.get("/carts/update/"+rowId+"/"+qty,
		     function (data) 
			 {  
				 if(data == "success")
				 {
					 location.reload();
				 }
				 else
				 {
					 alert("Cập nhật thất bại");
				 }
			 }
		  )
	  }

	  function deleteCart(name) 
	  {   
		  return confirm("Bạn chắc chắn muốn xóa sản phẩm "+name+" khỏi giỏ hàng không? ");
	  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('client.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\Xampp\htdocs\VietproStore\resources\views/client/carts/cart.blade.php ENDPATH**/ ?>