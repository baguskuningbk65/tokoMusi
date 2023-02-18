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