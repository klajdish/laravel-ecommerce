@php
    use App\Models\User;

@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="http://pweb.com/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="http://pweb.com/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="http://pweb.com/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="http://pweb.com/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="http://pweb.com/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="http://pweb.com/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="http://pweb.com/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="http://pweb.com/css/style1.css" type="text/css">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>

    <title>Document</title>
</head>
<body>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
            </a></li>
            <li><a href="#"><span class="icon_bag_alt"></span>
                <div class="tip">2</div>
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="storage/images/web/img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="#">Login</a>
            <a href="#">Register</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo ">
                        <h2 class="m-0 ">NOOBS</h2>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="/">Home</a></li>
                            <li><a href="/shop">Shop</a></li>
                            <li><a href="/contact">Contact</a></li>

                            @if (Session::has('userRole') && Session::get('userRole') == 1)
                                <li><a href="/admin">Admin</a></li>
                            @endif
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        @if(!Session::has('loginId'))
                            <div class="header__right__auth">
                                <a href="/login">Login</a>
                                <a href="/register">Register</a>
                            </div>
                        @else
                            <div class="header__right__auth">
                                <a href="/profile">
                                    {{-- <i class="bi bi-person"></i> --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                      </svg>
                                </a>
                                <a href="/logout">Logout</a>
                            </div>
                        @endif
                        <ul class="header__right__widget">
                          
                            <li><a href="/cart"><span class="icon_bag_alt"></span>
                                @if(Session::has('loginId'))
                                    @php
                                    $user = User::Where('id', Session::get('loginId'))->first();
                                    if($user){
                                        $cartItemProductsCount = $user->cart->cartItems()->count();
                                    }
                                    @endphp
                                <div class="tip">{{$cartItemProductsCount}}</div>
                                @endif
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    @yield('content')
    {{-- @yield('content1') --}}

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-7">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <h2 class="m-0 ">NOOBS</h2>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        cilisis.</p>
                        <div class="footer__payment">
                            <a href="#"><img src="storage/images/web/img/payment/payment-4.png" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-5">
                    <div class="footer__widget">
                        <h6>Quick links</h6>
                        <ul>
                            <li><a href="/shop">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4">
                    <div class="footer__widget">
                        <h6>Account</h6>
                        <ul>
                            <li><a href="/profile">Profile</a></li>
                        </ul>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-8 col-sm-8">
                    <div class="footer__newslatter">
                        <h6>NEWSLETTER</h6>
                        <form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <div class="footer__copyright__text">
                        <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved</a></p>
                    </div>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
            </div>
        </div>
    </footer>

</body>

<script src="http://pweb.com/js/bootstrap.min.js"></script>
<script src="http://pweb.com/js/jquery.magnific-popup.min.js"></script>
<script src="http://pweb.com/js/jquery-ui.min.js"></script>
<script src="http://pweb.com/js/mixitup.min.js"></script>
<script src="http://pweb.com/js/jquery.countdown.min.js"></script>
<script src="http://pweb.com/js/jquery.slicknav.js"></script>
<script src="http://pweb.com/js/owl.carousel.min.js"></script>
<script src="http://pweb.com/js/jquery.nicescroll.min.js"></script>
<script src="http://pweb.com/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
