<!--APP-SIDEBAR-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="index.html">
            <img src="<?=INCLUDE_DIR ?>/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
            <img src="<?=INCLUDE_DIR ?>/images/brand/logo-1.png" class="header-brand-img toggle-logo" alt="logo">
            <img src="<?=INCLUDE_DIR ?>/images/brand/logo-2.png" class="header-brand-img light-logo" alt="logo">
            <img src="<?=INCLUDE_DIR ?>/images/brand/logo-3.png" class="header-brand-img light-logo1" alt="logo">
        </a><!-- LOGO -->
        <a aria-label="Hide Sidebar" class="app-sidebar__toggle ml-auto" data-toggle="sidebar" href="#"></a><!-- sidebar-toggle-->
    </div>
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-pic">
                <img src="<?=INCLUDE_DIR ?>/images/users/10.jpg" alt="user-img" class="avatar-xl rounded-circle">
            </div>
            <div class="user-info">
                <h6 class=" mb-0 text-dark">Elizabeth Dyer</h6>
                <span class="text-muted app-sidebar__user-name text-sm">Administrator</span>
            </div>
        </div>
    </div>
    <div class="sidebar-navs">
        <ul class="nav  nav-pills-circle">
<!--            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Settings">-->
<!--                <a class="nav-link text-center m-2">-->
<!--                    <i class="fe fe-settings"></i>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Chat">-->
<!--                <a class="nav-link text-center m-2">-->
<!--                    <i class="fe fe-mail"></i>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Followers">-->
<!--                <a class="nav-link text-center m-2">-->
<!--                    <i class="fe fe-user"></i>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Logout">-->
<!--                <a class="nav-link text-center m-2" href="/login/logout">-->
<!--                    <i class="fe fe-power"></i>-->
<!--                </a>-->
<!--            </li>-->
        </ul>
    </div>
    <ul class="side-menu">
        <li><h3>Main</h3></li>
        <li class="slide">
            <a class="side-menu__item" href="/dashboard/index"><i class="side-menu__icon ti-home"></i><span class="side-menu__label">Dashboard</span></a>
            <ul class="slide-menu">
                <li><a class="slide-item" href="index.html"><span>Sales Dashboard</span></a></li>
                <li><a class="slide-item"  href="index2.html"><span>Marketing Dashboard</span></a></li>
                <li><a class="slide-item" href="index3.html"><span>Service Dashboard</span></a></li>
                <li><a class="slide-item" href="index4.html"><span>Finance Dashboard</span></a></li>
                <li><a class="slide-item" href="index5.html"><span>IT Dashboard</span></a></li>
            </ul>
        </li>
        <li><h3>PRODUCT</h3></li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-widget"></i><span class="side-menu__label">Category</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="/category/index" class="slide-item"> Add Category</a></li>
                <li><a href="/category/getlist" class="slide-item"> Category List</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-package"></i><span class="side-menu__label">Product</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="/product/index" class="slide-item"> Add Product</a></li>
                <li><a href="/product/getlist" class="slide-item"> Product List</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-panel"></i><span class="side-menu__label">Video</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="/video/index" class="slide-item"> Add Video</a></li>
                <li><a href="/video/getlist" class="slide-item"> Video List</a></li>
            </ul>
        </li>
        <li><h3>ORDER</h3></li>
        <li class="slide">
            <a class="side-menu__item" href="/order/getlist"><i class="side-menu__icon ti-bar-chart"></i><span class="side-menu__label">Order Management</span></a>
        </li>
        <li><h3>USER</h3><li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-user"></i><span class="side-menu__label">User Management</span><i class="angle fa fa-angle-right"></i></a>

        </li>

    </ul>
</aside>
<!--/APP-SIDEBAR-->