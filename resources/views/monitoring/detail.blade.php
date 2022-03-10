@extends('backend.index')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Detail</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('simos')}}">Home</a></li>
          <li class="breadcrumb-item">Detail</li>
          <li class="breadcrumb-item active">Monitoring</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Detail Monitoring</h5>
              <div class="icon" style="float: right; margin-top: -5%; width: 10%;">
              </div>
             <!--  <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->
              <!-- Table with stripped rows -->
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
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$row->nis}}</td>
                    <td>{{$row->kode}}</td>
                    <td>{{$row->skor}}</td>
                    <td>{{$row->tgl}}</td>
                    <td>{{$row->keterangan}}</td>
                    <td>Status</td>
                    <td></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>
         
        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection
<!-- @push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js" integrity="sha512-/n/dTQBO8lHzqqgAQvy0ukBQ0qLmGzxKhn8xKrz4cn7XJkZzy+fAtzjnOQd5w55h4k1kUC+8oIe6WmrGUYwODA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $('document').ready(function(){
    var nomor = ($details=>skor);
    var total = 0;
    for(i = 0; i <nomor.length; i++){
    total += nomor[i];
    }
    console.log(total);
  })
</script>

$endpush -->