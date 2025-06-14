<nav class="navbar navbar-expand-lg bg-warning">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">
            <img src="{{ asset('assets/images/paud.png') }}" alt="logo-paud" width="30px" class="me-2">
            {{-- <img src="{{ asset('assets/img/paud.png') }}" alt="logo-paud" width="30px" class="me-2"> --}}

            RA NURUL AMIN
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-2">
                <x-nav-link :active="request()->routeIs('/')" href="{{ route('/') }}">Home</x-nav-link>

                @php
                    $isUser = optional(Auth::user())->hasRole('user');
                    $isAdmin = optional(Auth::user())->hasRole('admin');
                @endphp

                <x-nav-link :active="request()->routeIs('perkembangan-ananda')" href="{{ route('perkembangan-ananda') }}"> Jejak Ananda</x-nav-link>
                <x-nav-link :active="request()->routeIs('profil-ananda')" href="{{ route('profil-ananda') }}">Profil Ananda</x-nav-link>
            </ul>
            <div class="d-flex gap-2">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-light fw-bold">Login</a>
                @endguest
                @if ($isAdmin)
                    <a href="{{ route('dashboard') }}" class="btn btn-light fw-bold">Dashboard</a>
                @endif
                @auth
                    <a href="{{ route('logout') }}" class="btn btn-danger fw-bold">Logout</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
