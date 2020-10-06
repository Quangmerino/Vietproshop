@extends('client.layouts.app')

@section('title')
	Cart
@endsection

@section('content')
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

				@foreach ($carts as $cart)
				<div class="product-cart">
					<div class="one-forth">
						<div class="product-img">
						    <img class="img-thumbnail cart-img" src="/uploads/{{$cart->options->image}}">
						</div>
						<div class="detail-buy">
							<h4>Mã : {{$cart->id}}</h4>
							<h5>{{$cart->name}}</h5>
						</div>
					</div>
					<div class="one-eight text-center">
						<div class="display-tc">
							<span class="price">{{number_format($cart->price,0,'','.')}} đ</span>
						</div>
					</div>
					<div class="one-eight text-center">
						<div class="display-tc">
							<input onchange="updateCart('{{ $cart->rowId }}',this.value)" type="number" id="quantity" name="quantity"
								class="form-control input-number text-center" value="{{$cart->qty}}">
						</div>
					</div>
					<div class="one-eight text-center">
						<div class="display-tc">
							<span class="price">{{number_format($cart->price*$cart->qty,0,'','.')}} đ</span>
						</div>
					</div>
					<div class="one-eight text-center">
						<div class="display-tc">
							<a onclick="return delete_cart(' {{$cart->name}} ')" href="/carts/delete/{{ $cart->rowId }}" class="closed"></a>
						</div>
					</div>
				</div>
				@endforeach

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
									<p><span>Tổng:</span> <span>{{$total}} đ</span></p>
								</div>
								<div class="grand-total">
									<p><span><strong>Tổng cộng:</strong></span> <span>{{$total}} đ</span></p>
									<a href="{{route('carts.checkout')}}" class="btn btn-primary">Thanh toán <i
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
@endsection

@section('scripts')
@parent
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
@endsection
