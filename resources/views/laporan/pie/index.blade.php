@extends('backend.index')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <form action="{{url('laporan/pie/cari')}}" method="GET" >
                {{-- @csrf --}}
                <div class="row">
                  <div class="col-lg-2 mb-3">
                    <label for="inputText"  class="col-form-label">NIS</label>
                    <div class="col-sm-12">
                      <input type="nember" name="nis" class="form-control">
                    </div>
                  </div>
                  {{-- <div class="col-lg-2 mb-3">
                    <label for="inputText" class="col-form-label">Rombel</label>
                    <div class="col-sm-12">
                      <input type="text" name="rombel" class="form-control">
                    </div>
                  </div> --}}
                  {{-- <div class="col-lg-2 mb-3">
                    <label for="inputText" class="col-form-label">Tgl Awal</label>
                    <div class="col-sm-12">
                      <input type="text" name="tgl_awal" id="tgl_awal"class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-2 mb-3">
                    <label for="inputText" class="col-form-label">Tgl Akhir</label>
                    <div class="col-sm-12">
                      <input type="text" name="tgl_akhir" id="tgl_akhir" class="form-control">
                    </div>
                  </div> --}}
                  <div class="col-lg-2 mb-3">
                    <label for="" class="col-form-label" >Action</label>
                    <div class="col-sm-10">
                      <button class="btn btn-primary btn-sm">Cari</button>
                      <a href="" class="btn btn-success btn-sm">Cetak</a>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="card-body">
              <h5 class="card-title">Pie Chart</h5>

              <!-- Pie Chart -->
              <canvas id="pieChart" style="max-height: 400px;"></canvas>
              {{-- @foreach($diagdata as $pie) --}}
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#pieChart'), {
                    type: 'pie',
                    data: {
                    //   labels: [
                    //     'pelanggaran',
                    //     'prestasi',
                    //     // 'Yellow'
                    //   ],
                        labels: {!! json_encode($jenis) !!},
                      datasets: [{
                        label: 'My First Dataset',
                        // data: [
                        //   100,
                        //   100, 
                        //   // 100
                        // ],
                        data: {!! json_encode($skor) !!},
                        backgroundColor: [
                          'rgb(255, 99, 132)',
                          'rgb(54, 162, 235)',
                          // 'rgb(255, 205, 86)'
                        ],
                        hoverOffset: 4
                      }]
                    }
                  });
                });
              </script>
              {{-- @endforeach --}}
              <!-- End Pie CHart -->

            </div>
          </div>
        </div>

        <!-- Right side columns -->
        <div class="col-lg-3">

          <!-- Recent Activity -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>
          </div><!-- End Recent Activity -->

          <!-- Budget Report -->

          <!-- Website Traffic -->

          <!-- News & Updates Traffic -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  
@endsection
@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
    {{-- <script type="text/javascript">
            $(document).ready(function(){
                var date = new Date();
            });
    </script> --}}
@endpush
