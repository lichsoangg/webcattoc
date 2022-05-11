<section class="header-breadcrumb bgimage overlay overlay--dark">
    <div class="bg_image_holder"><img src="img/chude1.jpg" alt=""></div>
    <div class="mainmenu-wrapper">
        <div class="menu-area menu1 menu--light">
            <div class="top-menu-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="menu-fullwidth">
                                <div class="logo-wrapper order-lg-0 order-sm-1">
                                </div><!-- ends: .logo-wrapper -->
                                <div class="menu-container order-lg-1 order-sm-0">
                                    <div class="d_menu">
                                        <nav class="navbar navbar-expand-lg mainmenu__menu">
                                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#direo-navbar-collapse" aria-controls="direo-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                                                <span class="navbar-toggler-icon icon-menu"><i class="la la-reorder"></i></span>
                                            </button>
                                            <!-- Collect the nav links, forms, and other content for toggling -->
                                            <div class="collapse navbar-collapse" id="direo-navbar-collapse">
                                                <ul class="navbar-nav">
                                                    <li>
                                                        <a href="/client">Trang Chủ</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /.navbar-collapse -->
                                        </nav>
                                    </div>
                                </div>
                                <div class="menu-right order-lg-2 order-sm-2">

                                    <!-- start .author-area -->
                                    <div class="author-area">
                                        <div class="author__access_area">
                                            <ul class="d-flex list-unstyled align-items-center">
                                                @php
                                                $user = Auth::user();
                                                @endphp
                                                @if(isset($user))
                                                <li>
                                                    <a href="/nguoidung" class="btn btn-xs btn-gradient btn-gradient-two">
                                                        <span class="la la-home"></span> Tài Khoản
                                                    </a>
                                                </li>
                                                @else
                                                @endif
                                                @php
                                                $user = Auth::user();
                                                @endphp
                                                @if(isset($user))
                                                <li>
                                                    <a href="/logout" class="access-link">Đăng Xuất</a>
                                                </li>
                                                @else
                                                <li>
                                                    <a href="" class="access-link" data-toggle="modal" data-target="#login_modal">Đăng Nhập</a>
                                                    <span>Hoặc</span>
                                                    <a href="" class="access-link" data-toggle="modal" data-target="#signup_modal">Đăng Ký</a>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- end .author-area -->

                                </div><!-- ends: .menu-right -->
                            </div>
                        </div>
                    </div>
                    <!-- end /.row -->
                </div>
                <!-- end /.container -->
            </div>
            <!-- end  -->
        </div>
    </div><!-- ends: .mainmenu-wrapper -->
    {{-- Đăng nhập --}}
    <div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="login_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="login_modal_label"><i class="la la-lock"></i>Đăng Nhập</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <input type="text" id="email_login" class="form-control" placeholder="Email" required>
                        <input type="password" id="password_login" class="form-control" placeholder="Mật khẩu" required>
                        {!! NoCaptcha::renderJs() !!}
			            {!! NoCaptcha::display() !!}
                        <br>
                        <button type="submit" class="btn btn-block btn-lg btn-gradient btn-gradient-two" id="dangnhap">Đăng nhập</button>
                    <div class="form-excerpts">
                        <ul class="list-unstyled">
                            <li>Bạn chưa có tài khoản? <a href="" data-toggle="modal" data-target="#signup_modal">Đăng ký</a></li>
                            <li><a href="">Quên mật khẩu ?</a></li>
                        </ul>
                        <div class="social-login">
                            <span>Or connect with</span>
                            <p><a href="" class="btn btn-outline-secondary"><i class="fab fa-facebook-f"></i> Facebook</a><a href="" class="btn btn-outline-danger"><i class="fab fa-google-plus-g"></i> Google</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Đăng ký --}}
    <div class="modal fade" id="signup_modal" tabindex="-1" role="dialog" aria-labelledby="signup_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signup_modal_label"><i class="la la-lock"></i> Đăng Ký</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <input type="text" id="hovaten" class="form-control" placeholder="Họ và tên" required>
                        <input type="number" id="sodienthoai" class="form-control" placeholder="Số điện thoại" required>
                        <input type="email" id="email" class="form-control" placeholder="email" required>
                        <input type="password" id="password" class="form-control" placeholder="Mật Khẩu" required>
                        <input type="password" id="repassword" class="form-control" placeholder="Nhập lại mật khẩu" required>
                        {!! NoCaptcha::renderJs() !!}
			            {!! NoCaptcha::display() !!}
                        <br>
                        <button type="submit" class="btn btn-block btn-lg btn-gradient btn-gradient-two" id="dangky">Đăng Ký</button>
                    <div class="form-excerpts">
                        <ul class="list-unstyled">
                            <li><a href="">Quên mật khẩu ?</a></li>
                        </ul>
                        <div class="social-login">
                            <span>Or Signup with</span>
                            <p><a href="" class="btn btn-outline-secondary"><i class="fab fa-facebook-f"></i> Facebook</a><a href="" class="btn btn-outline-danger"><i class="fab fa-google-plus-g"></i> Google</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumb-wrapper content_above">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="page-title">Chào Mừng Bạn Đến Với Barber</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Đc : 24 Vũ Mộng Nguyên - TP. Đà Nẵng</a></li>
                        </ol>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Điện Thoại : 0393900816</a></li>
                        </ol>
                    </nav>
                    <br>
                    <li>
                        <a href="https://www.facebook.com/kiet100220/" class="btn btn-xs btn-warning btn-gradient-two">
                            <span class="la la-facebook"></span> Facebook
                        </a>
                    </li>
                </div>
            </div>
        </div>
    </div><!-- ends: .breadcrumb-wrapper -->
</section>
