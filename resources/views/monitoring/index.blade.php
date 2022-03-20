@extends('backend.index')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('simos')}}">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Monitoring</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Monitoring</h5>
              <div class="icon" style="float: right; margin-top: -5%; width: 10%;">
                <button type="button" class="btn btn-primary text-white">
                  <a href="{{route('monitoring.create')}}" class="text-white">Add Data</a>
                </button>
              </div>
             <!--  <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Name</th>
                    <th scope="col">Total Point</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($details as $row)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$row->nis}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->skor}}</td>
                    <td>{{$row->tgl}}</td>
                    <td>{{$row->jenis}}</td>
                    @if( $row->jenis=="pelanggaran")
                      @if($row->skor <= 500)
                      <td class="bg-success text-center text-white">Aman</td>
                      @endif
                      @if($row->skor >= 500)
                      <td class="bg-warning text-center text-white">SP 1</td>
                      @endif
                      @if($row->skor >= 750)
                      <td class="bg-danger text-center text-white">SP 2</td>
                      @endif
                      @if($row->skor >= 1000)
                      <td class="bg-dark text-center text-white">Di Keluarkan</td>
                      @endif
                    @else($row->jenis=="prestasi")
                      @if($row->skor <= 1500)
                      <td class="bg-info text-center text-white">Biasa</td>
                      @endif
                      @if($row->skor >= 1500)
                      <td class="bg-warning text-center text-white">Baik</td>
                      @endif
                      @if($row->skor >= 2000)
                      <td class="bg-success text-center text-white"> Sangat Baik </td>
                      @endif
                      @if($row->skor >= 2500)
                      <td class="bg-primary text-center text-white"> Student Of The Year </td>
                      @endif
                    @endif
                    
                    <td>
                        <a href="{{route('monitoring.edit',$row->id)}}" class="btn btn-sm btn-primary demo-google-material-icon"><i class="bi bi-pencil"></i></a>
                        <a href="{{route('monitoring.delete',$row->id)}}" onclick="return confirm('apa kamu serius?')" class="btn btn-sm btn-danger demo-google-material-icon"><i class="bi bi-trash"></i>  </a>
                        @if($row->jenis == 'pelanggaran')
                        <a href="{{route('monitoring.detail',$row->nis)}}"  class="btn btn-sm btn-primary demo-google-material-icon" ><i class="bi bi-files"></i></a>
                        @else 
                        <a href="{{route('monitoring.detail2',$row->nis)}}"  class="btn btn-sm btn-primary demo-google-material-icon" ><i class="bi bi-files"></i></a>
                        @endif
                        {{-- <a href="" class="btn btn-sm btn-warning" ><i class="bi bi-cloud-download" ></i></a> --}}
                      </td>
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
@push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js" integrity="sha512-/n/dTQBO8lHzqqgAQvy0ukBQ0qLmGzxKhn8xKrz4cn7XJkZzy+fAtzjnOQd5w55h4k1kUC+8oIe6WmrGUYwODA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
</script>
@endpush