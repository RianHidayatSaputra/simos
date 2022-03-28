@extends('backend.index')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Laporan Prestasi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('simos')}}">Home</a></li>
          <li class="breadcrumb-item">Laporan</li>
          <li class="breadcrumb-item active">Prestasi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Laporan Prestasi</h5>
              <!-- <div class="icon" style="float: right; margin-top: -5%; width: 10%;">
                <button type="button" onclick="window.print()" class="btn btn-primary text-white">
                  Cetak
                </button>
              </div> -->
             <!--  <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->
              <!-- Table with stripped rows -->
              <div class="table-responsive-sm">
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Point</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($details as $row)
                  <tr>
                  @if( $row->jenis=="prestasi")
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$row->nis}}</td>
                    <td>{{$row->kode}}</td>
                    <td>{{$row->skor}}</td>
                    <td>{{$row->tgl}}</td>
                    <td>{{$row->keterangan}}</td>
                    <td>{{$row->jenis}}</td>
                    <td></td>
                    @endif
                  </tr>
                  @endforeach
                </tbody>
              </table>
              </div>
              <!-- End Table with stripped rows -->

            </div>
          </div>
         
        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection
@push('js')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script>
    document.ready(function(){
      $('#print').on('click',function(){
        window.print();
      });
    })
  </script>
$endpush