<header id="top-header">
    <nav class="navbar navbar-expand-md navbar-light py-0 main-header">
        <div class="container-fluid px-0">
            <a class="logo" href="#">
                <img height="70px" src="{{ asset('storage/' . $setting->logo) }}" alt="{{ $setting->title }}" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynav"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item registation d-flex">
                        <a class="nav-link signin" href="#">Sign in </a>
                        <a class="nav-link" href="#">Sign up </a>
                    </li>
                    <li class="nav-item vector">
                        <a href="" class="nav-link">Company</a>
                    </li>
                    <li class="nav-item vector">
                        <a href="" class="nav-link">Support</a>
                    </li>
                    <li class="nav-item lang vector">
                        <a href="" class="nav-link">EN <span>AR</span></a>
                    </li>
                    <li class="nav-item contact">
                        <a href="" class="nav-link">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- left slidebar -->
    <div id="left-slide">

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/"><i class="fas fa-home"></i> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('service') }}"> Service</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/logo-design">Logo Designe</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/business-card">Desgine of Busness Card</a>
            </li>

        </ul>
    </div>
</header>



<div class="sticky_cart">
    <div class="cart-total">
        <i class="fa fa-shopping-cart  sticky_cart_icon"></i>
        <h5> $ <span id="total_cart_payment_amount">
                @php
                    echo Cart::subtotal();
                @endphp
            </span>

        </h5>
    </div>
    <div class="cart-item-total">
        @php
            echo Cart::count();
        @endphp items</div>
</div>
