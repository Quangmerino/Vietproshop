<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="{{route('admin/index')}}"><span>vietpro </span>Admin</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="{{route('admin/index')}}" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> 
                       @if(Auth::check())
                           {{ Auth::user()->email }}
                       @endif
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu"><li><a href="#">
                        @if(Auth::check())
                            Name: {{ Auth::user()->name }}  <br>
                            Phone:{{ Auth::user()->phone }} <br> 
                            Level:@if (Auth::user()->level == 1)
                                      Admin
                                  @else
                                      User
                                  @endif
                        @endif
                    </a></li>
                    <li><a href="{{route('logout')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>