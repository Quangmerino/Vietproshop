<nav class="colorlib-nav" role="navigation">
    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-2">
                    <div id="colorlib-logo"><a href="{{route('home.index')}}"><img src="images/logo.png" alt="" style="width: 300px;height: 50px;"></a></div>
                </div>
                <div class="col-xs-10 text-right menu-1">
                    <ul>
                        <li class="active"><a href="{{route('home.index')}}">Trang chủ</a></li>
                        <li class="has-dropdown">
                            <a href="{{route('products.shop')}}">Cửa hàng</a>
                            <ul class="dropdown">
                                <li ><a href="{{route('carts.cart')}}">Giỏ hàng</a></li>
                                <li><a href="{{route('carts.checkout')}}">Thanh toán</a></li>

                            </ul>
                        </li>
                        <li><a href="{{route('home.about')}}">Giới thiệu</a></li>
                        <li><a href="{{route('home.contact')}}">Liên hệ</a></li>
                        <li><a href="{{route('carts.cart')}}"><i class="icon-shopping-cart"></i> Giỏ hàng [{{count(Cart::content())}}]</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>