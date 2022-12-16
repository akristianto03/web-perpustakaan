<nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
    <a class="navbar-brand" href="#">Web Perpustakaan</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="/">Katalog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('/user/pinjam')) ? 'active' : '' }}"
                    href="{{ route('user.pinjam.index') }}">Peminjaman</a>
            </li>
        </ul>
    </div>
    @if (Auth::check())
        <a class="text-decoration-none nav-link dropdown-toggle text-gray-800" type="button" id="dropdownMenuButton"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hai,
            <span>{{ Auth::user()->name }}</span></a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="dropdownMenuButton">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="dropdown-item text-danger" type="submit">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
                    Logout
                </button>
            </form>
        </div>
    @else
        <a href="{{ route('login') }}" class="btn btn-outline-primary my-2 mx-2">Login</a>
        <a href="{{ route('register') }}" class="btn btn-outline-primary my-2">Register</a>    
    @endif
</nav>