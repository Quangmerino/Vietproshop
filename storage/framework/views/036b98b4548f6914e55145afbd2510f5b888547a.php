<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo e(route('admin/index')); ?>"><span>vietpro </span>Admin</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="<?php echo e(route('admin/index')); ?>" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> 
                       <?php if(Auth::check()): ?>
                           <?php echo e(Auth::user()->email); ?>

                       <?php endif; ?>
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu"><li><a href="#">
                        <?php if(Auth::check()): ?>
                            Name: <?php echo e(Auth::user()->name); ?>  <br>
                            Phone:<?php echo e(Auth::user()->phone); ?> <br> 
                            Level:<?php if(Auth::user()->level == 1): ?>
                                      Admin
                                  <?php else: ?>
                                      User
                                  <?php endif; ?>
                        <?php endif; ?>
                    </a></li>
                    <li><a href="<?php echo e(route('logout')); ?>"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav><?php /**PATH G:\Xampp\htdocs\VietproStore\resources\views/admin/layouts/nav.blade.php ENDPATH**/ ?>