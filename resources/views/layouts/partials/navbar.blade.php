<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="/" class="navbar-brand p-0">
        @php
            $setting = App\Models\Setting::get();
        @endphp
        @foreach ($setting as $item)
        <h1 class="m-0">{{$item->site_title}}</h1>
        @endforeach

        {{-- <p class="text-white m-0">Sistem Aplikasi Musyawarah Cabang</p> --}}
        <!-- <img src="img/logo.png" alt="Logo"> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto py-0">
            <a href="/" class="nav-item nav-link {{Request::is('/') ? "active" : ""}}">Home</a>
            <a href="quick-count" class="nav-item nav-link {{Request::is('quick-count') ? "active" : ""}}">Quick Count</a>
            <a href="voting" class="nav-item nav-link {{Request::is('voting') ? "active" : ""}}">Voting</a>   
        </div>
        
        
        @guest
        <a href="{{route('login')}}" class="btn btn-primary-gradient rounded-pill py-2 px-4 d-md-block d-block mt-md-0 mt-3">Login</a>
        @endguest
        
        @auth
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle rounded-pill py-2 px-4 d-md-block d-block mt-md-0 mt-3" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
               Hai, {{auth()->user()->fullname}}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            @if (auth()->user()->role == 'Admin')
                <li><a class="dropdown-item {{Request::is('management-peserta') ? "active" : ""}}" href="{{route('management-peserta.index')}}">Management Peserta</a></li>
                <li><a class="dropdown-item {{Request::is('management-kandidat') ? "active" : ""}}" href="{{route('management-kandidat.index')}}">Management Kandidat</a></li>
                <li><a class="dropdown-item {{Request::is('report') ? "active" : ""}}" href="report">Report</a></li>
                <li><a class="dropdown-item {{Request::is('setting') ? "active" : ""}}" href="{{route('setting.index')}}">Setting</a></li>
                <hr>
            @endif
                <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
            </ul>
        </div>
        @endauth
    </div>
</nav>