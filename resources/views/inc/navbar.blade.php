<nav class="navbar navbar-expand-sm navbar-light bg-navbar" style="background:	#fcfcb5;border-bottom:2px solid">
    <div class="container">
        <a class="navbar-brand">
            <img src="/storage/logo/Logo BPK Penabur.png" alt="" width="30pt">
        </a>
        <a class="navbar-brand" style="font-size:18px;line-height:1.4rem">Sistem Penggajian<br>Guru dan Karyawan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav" style="font-size:18px">
                <a class="nav-link" href="/dashboard">Dashboard</a>
                <a class="nav-link" href="/employees">Guru dan Karyawan</a>
                <a class="nav-link" href="/salary_groups">Golongan</a>
                <a class="nav-link" href="/salary">Gaji</a>
                <a class="nav-link" href="/analyst">Analyst</a>
                <a class="nav-link" href="/score">Score</a>
                <!-- <a class="nav-link" href="/slip_gaji">Slip Gaji</a> -->
                        {{-- <a class="nav-link" href="/index">adminlte</a> --}}
            </div>
                    
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto" style="font-size:18px">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" style="font-size:18px"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
        </div>
    </div>
</nav>