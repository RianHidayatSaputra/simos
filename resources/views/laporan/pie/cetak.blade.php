<!Doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SiMos</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('backend/img/favicon.png')}}" rel="icon">
  <link href="{{asset('backend/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('backend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('backend/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('backend/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('backend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('backend/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('backend/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <main id="main" class="main">
            <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              {{-- <form action="{{url('laporan/pie/cari')}}" method="GET" > --}}
              <form action="{{route('laporan.search.pie')}}" method="get" enctype="multipart/form-data">
                {{-- @csrf --}}
                <div class="row">
                  <div class="col-lg-3 mb-3">
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
                  <div class="col-lg-3 mb-3">
                    <label for="inputText" class="col-form-label">Tgl Awal</label>
                    <div class="col-sm-12">
                      <input type="date" name="tgl_awal" id="tgl_awal"class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-3 mb-3">
                    <label for="inputText" class="col-form-label">Tgl Akhir</label>
                    <div class="col-sm-12">
                      <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-3 mb-3">
                    <label for="" class="col-form-label" >Action</label>
                    <!-- <div class="col-sm-10">
                      <button class="btn btn-primary btn-sm">Cari</button>
                      <a href="" class="btn btn-success btn-sm">Cetak</a>
                    </div> -->
                    <div class="col-sm-12">
                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button class="btn btn-primary">Cari</button>
                        {{-- <button type="button" onclick="window.print()" class="btn btn-success text-white">
                          Cetak
                        </button> --}}
                      </div>
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
    </main>

  <script src="{{asset('backend/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('backend/assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('backend/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('backend/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('backend/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('backend/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('backend/assets/vendor/php-email-form/validate.js')}}"></script>
    {{-- @stack('js') --}}
  <!-- Template Main JS File -->
  <script src="{{asset('backend/assets/js/main.js')}}"></script>
</body>
</html>

