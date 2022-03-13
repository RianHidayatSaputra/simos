 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('rayon.dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('monitoring.index')}}">
          <i class="bi bi-person"></i>
          <span>Monitoring</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('laporan.prestasi.index')}}">
              <i class="bi bi-circle"></i><span>Prestasi</span>
            </a>  
          </li>
          <li>
            <a href="{{route('laporan.pelanggaran.index')}}">
              <i class="bi bi-circle"></i><span>Pelanggaran</span>
            </a>
          </li>
          <li>
            <a href="{{route('laporan.keseluruhan.index')}}">
              <i class="bi bi-circle"></i><span>Keseluruhan</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('kontrol.index')}}">
          <i class="bi bi-person"></i>
          <span>Kontrol</span>
        </a>
      </li

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('rayon.logout')}}">
          <i class="bi bi-person"></i>
          <span>Sign Out</span>
        </a>
      </li><!-- End Profile Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->