<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TokoMusi - Login User</title>

    <!-- Panggil Css -->
    <link rel="stylesheet" href={{asset('css/style.css')}}>

    <!-- Panggil Bootstrap -->
    <link rel="stylesheet" href={{asset('css/bootstrap.css')}}>

    <!-- Panggil Icon -->
    <script src={{asset('https://kit.fontawesome.com/3d647cac5e.js')}} crossorigin="anonymous"></script>
</head>

<body>
    <!-- Awal Navbar -->
    <section id="Header-TokoMusi">
        <div class="bg-header">
            <div class="container">
                <div class="row mt-3">
                    <div class="col-lg-2">
                        <h1>Toko<span>Musi</span></h1>
                    </div>
                    <div class="col-lg-4">
                        <form class="form-inline">
                            <input class="form-control col mt-1 pencarian" type="search" placeholder="Belanjo apo hari ini....." aria-label="Search">
                        </form>
                    </div>

                    @if(!Auth::user())
                    <div class="col-lg-1 text-center">
                        <a href="Keranjang.html" class="fas fa-cart-plus"></a>
                    </div>
                    <div class="col-lg-1 text-center">
                        <i class="far fa-bell"></i>
                    </div>
                    <div class="col-lg-2">
                        <a href="{{url('/loginuser')}}"><button class="btn btn-warning">Login</button></a>
                    </div>
                    <div class="col-lg-2">
                        <a href="{{url('/registeruser')}}"><button class="btn btn-outline-warning">Register</button></a>
                    </div>
                    @else
                    <div class="col-lg-2 ml-5">
                        <a href="{{url('/logoutuser')}}"><button class="btn btn-outline-warning">Log Out</button></a>
                    </div>
                    <div class="col-lg-2 ml-5">
                        <a href="#"><button class="btn btn-outline-warning">{{Auth::user()->name}}</button></a>
                    </div>
                    @endif
                </div>
            </div>
    </section>
    <!-- Akhir Navbar -->

    <!-- Awal Login -->
    <section id="Halaman-Login">
        <div class="container">
            <div class="row mt-5">
                <div class="col">
                    <h1>Login <span>Account</span></h1>
                </div>
            </div>
            <div class="bg-login mt-3 mb-5">
                <div class="row">
                    <div class="col-lg-6 pt-5">
                        <img src="./assets/Login.png" alt="login">
                    </div>
                    <div class="col-lg-6 login">
                        <div class="form-group row email">
                            <div class="col-lg-10">
                                <label">Username/Email</label>
                                    <input type="email" class="form-control" placeholder="Masukkan username/email">
                            </div>
                        </div>
                        <div class="form-group row password">
                            <div class="col-lg-10">
                                <label">Password</label>
                                    <input type="password" class="form-control" placeholder="Masukkan password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 text-right lp-password">
                                <label for="">Lupa Password?</label>
                            </div>
                        </div>
                        <div class="row mt-lg-2">
                            <div class="col-lg-10 mb-5 text-center">
                                <a href={{url('/category')}}>
                                    <div class="btn btn-warning">Login <i class="fa fa-long-arrow-right"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Login -->

    <script src={{asset('js/jquery.slim.min.js')}}></script>
    <script src={{asset('js/bootstrap.min.js')}}></script>
</body>

</html>