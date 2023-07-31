<nav id="navbar" class="navbar">
    <ul>
        <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
        <li><a class="nav-link scrollto" href="#about">About</a></li>
        <li><a class="nav-link scrollto" href="#services">Services</a></li>
        <li><a class="nav-link   scrollto" href="#portfolio">Product</a></li>
        <li><a class="nav-link scrollto" href="#team">Team</a></li>
        <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        @if (Auth::check())
            <li class="dropdown"><a href="#"><span class="fw-bold">{{ Auth::user()->name }}</span> <i
                        class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a href="/dashboard">Dashboard</a></li>
                    <hr>
                    <li><a href="/sign_out">Sign Out</a></li>

                </ul>
            </li>
        @else
            <li><a class="getstarted scrollto" href="#" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">Log
                    in</a></li>
        @endif
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->
