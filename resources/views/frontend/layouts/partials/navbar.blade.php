<div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="index.html" class="logo d-flex align-items-center">
      <img src="{{asset('assets/img/logo.png')}}" alt="">
      <span>SiMos</span>
    </a>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
        <li><a class="nav-link scrollto" href="#about">Tentang Aplikasi</a></li>
        <li><a class="nav-link scrollto" href="{{route('frontend.grafik')}}">Grafik</a></li>
        <li><a class="nav-link scrollto" href="{{route('frontend.prestasi.tertinggi')}}">Prestasi Tertinggi</a></li>
        <li><a class="getstarted scrollto" href="{{route('login.view')}}">Login</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>