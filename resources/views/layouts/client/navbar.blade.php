<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 pe-4">
                <a href="index.html" class="nav-item nav-link active">Home</a>
                <a href="{{route('shop')}}" class="nav-item nav-link">Shop</a>

                @if (Auth::user())
                <a class="nav-item nav-link" href="{{route('cart')}}"><img src="{{asset('client/img/cart.svg')}}"></a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                    <div class="dropdown-menu m-0">
                        <a href="team.html" class="dropdown-item">Profile</a>
                        <a href="testimonial.html" class="dropdown-item">Setting</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>



                    </div>
                </div>

                    {{-- <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                        class="nav-item nav-link">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form> --}}
                @else
                    <a href="{{ route('login') }}" class="nav-item nav-link ">Login</a>
                    <a href="{{ route('register') }}" class="nav-item nav-link">Registration</a>
                @endif




            </div>

        </div>
    </nav>


</div>
