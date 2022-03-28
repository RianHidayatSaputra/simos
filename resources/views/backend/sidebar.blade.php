 <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      {{-- @if(Session::get('username') == DB::table('gurus')->where(['username'=>$username])->first()) --}}
      @if(DB::table('gurus')->where(['username'=>Session::get('username')])->first())
            {{-- dashboard --}}
            <li class="nav-item">
              <a class="nav-link " href="{{route('admin.dashboard')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
              </a>
            </li><!-- End Dashboard Nav -->

            {{-- monitoring --}}
            <li class="nav-item">
              <a class="nav-link collapsed" href="{{route('monitoring.index')}}">
                <i class="bi bi-person"></i>
                <span>Monitoring</span>
              </a>
            </li><!-- End Profile Page Nav -->
      @elseif(DB::table('orangtuas')->where(['username'=>Session::get('username')])->first())
            {{-- dashboard --}}
            <li class="nav-item">
              <a class="nav-link " href="{{route('admin.dashboard')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
              </a>
            </li><!-- End Dashboard Nav -->

            {{-- monitoring --}}
            <li class="nav-item">
              <a class="nav-link collapsed" href="{{route('monitoring.index')}}">
                <i class="bi bi-person"></i>
                <span>Monitoring</span>
              </a>
            </li><!-- End Profile Page Nav -->
      @elseif(DB::table('prayons')->where(['username'=>Session::get('username')])->first())
            {{-- dashboard --}}
            <li class="nav-item">
              <a class="nav-link " href="{{route('admin.dashboard')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
              </a>
            </li><!-- End Dashboard Nav -->

            {{-- monitoring --}}
            <li class="nav-item">
              <a class="nav-link collapsed" href="{{route('monitoring.index')}}">
                <i class="bi bi-person"></i>
                <span>Monitoring</span>
              </a>
            </li><!-- End Profile Page Nav -->
                  {{-- kontrol --}}
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('kontrol.index')}}">
          <i class="bi bi-person"></i>
          <span>Kontrol</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <!-- End Components Nav -->

      {{-- laporan --}}
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
          <li>
            <a href="{{route('laporan.pie.index')}}">
            <i class="bi bi-circle"></i><span>Data Pie</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      @elseif(DB::table('siswas')->where(['username'=>Session::get('username')])->first())
            {{-- dashboard --}}
            <li class="nav-item">
              <a class="nav-link " href="{{route('admin.dashboard')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
              </a>
            </li><!-- End Dashboard Nav -->
            {{-- monitoring --}}
            <li class="nav-item">
              <a class="nav-link collapsed" href="{{route('monitoring.index')}}">
                <i class="bi bi-person"></i>
                <span>Monitoring</span>
              </a>
            </li><!-- End Profile Page Nav -->
      
      @elseif(DB::table('users')->where(['username'=>Session::get('username')])->first())
      {{-- hello admin --}}

      {{-- dashboard --}}
      <li class="nav-item">
        <a class="nav-link " href="{{route('admin.dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      {{-- master --}}
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('rombel.index')}}">
              <i class="bi bi-circle"></i><span>Rombel</span>
            </a>  
          </li>
          <li>
            <a href="{{route('rayon.index')}}">
              <i class="bi bi-circle"></i><span>Rayon</span>
            </a>
          </li>
          <li>
            <a href="{{route('kode.index')}}">
              <i class="bi bi-circle"></i><span>Kode Prilaku</span>
            </a>
          </li>
          <!-- <li>
            <a href="components-buttons.html">
              <i class="bi bi-circle"></i><span>Kode Pelanggaran</span>
            </a>
          </li> -->
        </ul>
      </li><!-- End Components Nav -->

      {{-- user --}}
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('user.index')}}">
          <i class="bi bi-person"></i>
          <span>User</span>
        </a>
      </li><!-- End Profile Page Nav -->

      {{-- guru --}}
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('guru.index')}}">
          <i class="bi bi-person"></i>
          <span>Guru</span>
        </a>
      </li><!-- End Profile Page Nav -->

      {{-- ortu wali --}}
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('ortu.index')}}">
          <i class="bi bi-person"></i>
          <span>Ortu/Wali</span>
        </a>
      </li>

      {{-- siswa --}}
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('siswa.index')}}">
          <i class="bi bi-person"></i>
          <span>Siswa</span>
        </a>
      </li><!-- End Profile Page Nav -->

      {{-- pembimbing rayon --}}
      <!-- End Profile Page Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('prayon.index')}}">
          <i class="bi bi-person"></i>
          <span>Pembimbing Rayon</span>
        </a>
      </li>

      {{-- monitoring --}}
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('monitoring.index')}}">
          <i class="bi bi-person"></i>
          <span>Monitoring</span>
        </a>
      </li><!-- End Profile Page Nav -->

      {{-- kontrol --}}
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('kontrol.index')}}">
          <i class="bi bi-person"></i>
          <span>Kontrol</span>
        </a>
      </li><!-- End Profile Page Nav -->
      <!-- End Components Nav -->

      {{-- laporan --}}
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
          <li>
            <a href="{{route('laporan.pie.index')}}">
            <i class="bi bi-circle"></i><span>Data Pie</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      @endif

      

    </ul>

  </aside><!-- End Sidebar-->