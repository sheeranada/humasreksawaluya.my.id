<nav class="navbar navbar-expand-lg bg-primary sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/" style="color: white">HUMAS | Rawat Jalan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/" style="color: whitesmoke">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/data_pasien_rajal" style="color: whitesmoke">Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/analisa_pxrajal" style="color: whitesmoke">Analisa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-arrow-right-from-bracket"></i>
                        {{-- <p>{{ __('Logout') }}</p> --}}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
