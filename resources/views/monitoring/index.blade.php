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
              @if(DB::table('siswas')->where(['username'=>Session::get('username')])->first())
              @elseif(DB::table('orangtuas')->where(['username'=>Session::get('username')])->first())
              @else
              <div class="icon" style="float: right; margin-top: -5%; width: 10%;">
                <button type="button" class="btn btn-primary text-white">
                  <a href="{{route('monitoring.create')}}" class="text-white">Add</a>
                </button>
              </div>
              @endif
             <!--  <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->
              <!-- Table with stripped rows -->
              <div class="table-responsive-sm">
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Name</th>
                    <th scope="col">Total Point</th>
                    {{-- <th scope="col">Tanggal</th> --}}
                    <th scope="col">Jenis</th>
                    <th scope="col">Status</th>
                    @if(DB::table('siswas')->where(['username'=>Session::get('username')])->first())
                    @elseif(DB::table('orangtuas')->where(['username'=>Session::get('username')])->first())
                    @else
                    <th scope="col">Action</th>
                    @endif
                  </tr>
                </thead>
                @if(DB::table('users')->where(['username'=>Session::get('username')])->first())
                <tbody>
                  @foreach($monitoring as $row)
                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                      <td>{{$row->nis}}</td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->skor}}</td>
                      {{-- <td>{{$row->tgl}}</td> --}}
                      <td>{{$row->jenis}}</td>
                      @if( $row->jenis=="pelanggaran")
                        @if($row->skor <= 500 )
                        <td>
                          <span class="badge bg-primary"><i class="bi bi-star me-1"></i> Aman </span>
                        </td>
                        @elseif($row->skor >= 500)
                        <td >
                          <span class="badge bg-info text-dark"><i class="bi bi-info-circle me-1"></i> SP 1 </span>
                        </td>
                        @elseif($row->skor >= 750)
                        <td >
                          <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> SP 2 </span>
                        </td>
                        @elseif($row->skor >= 1000)
                        <td class="bg-dark text-center text-white">
                          <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Di Keluarkan </span>
                        </td>
                        @endif
                      @else($row->jenis=="prestasi")
                        @if($row->skor <= 1500)
                        <td>
                          <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Biasa </span>
                        </td>
                        @elseif($row->skor >= 1500)
                        <td>
                          <span class="badge bg-primary"><i class="bi bi-star me-1"></i> Baik </span>
                        </td>
                        @elseif($row->skor >= 2000)
                        <td>
                          <span class="badge bg-primary"><i class="bi bi-star me-1"></i> Sangat Baik </span>
                        </td>
                        @elseif($row->skor >= 2500)
                        <td>
                          <span class="badge bg-light text-dark"><i class="bi bi-star me-1"></i> Student Of The Year </span>
                        </td>
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
                @elseif(DB::table('gurus')->where(['username'=>Session::get('username')])->first())
                <tbody>
                  @foreach($monitoring as $row)
                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                      <td>{{$row->nis}}</td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->skor}}</td>
                      {{-- <td>{{$row->tgl}}</td> --}}
                      <td>{{$row->jenis}}</td>
                      @if( $row->jenis=="pelanggaran")
                        @if($row->skor <= 500 )
                        <td>
                          <span class="badge bg-primary"><i class="bi bi-star me-1"></i> Aman </span>
                        </td>
                        @elseif($row->skor >= 500)
                        <td >
                          <span class="badge bg-info text-dark"><i class="bi bi-info-circle me-1"></i> SP 1 </span>
                        </td>
                        @elseif($row->skor >= 750)
                        <td >
                          <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> SP 2 </span>
                        </td>
                        @elseif($row->skor >= 1000)
                        <td class="bg-dark text-center text-white">
                          <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Di Keluarkan </span>
                        </td>
                        @endif
                      @else($row->jenis=="prestasi")
                        @if($row->skor <= 1500)
                        <td>
                          <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Biasa </span>
                        </td>
                        @elseif($row->skor >= 1500)
                        <td>
                          <span class="badge bg-primary"><i class="bi bi-star me-1"></i> Baik </span>
                        </td>
                        @elseif($row->skor >= 2000)
                        <td>
                          <span class="badge bg-primary"><i class="bi bi-star me-1"></i> Sangat Baik </span>
                        </td>
                        @elseif($row->skor >= 2500)
                        <td>
                          <span class="badge bg-light text-dark"><i class="bi bi-star me-1"></i> Student Of The Year </span>
                        </td>
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
                @elseif(DB::table('prayons')->where(['username'=>Session::get('username')])->first())
                <tbody>
                  @foreach($monitoring as $row)
                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                      <td>{{$row->nis}}</td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->skor}}</td>
                      {{-- <td>{{$row->tgl}}</td> --}}
                      <td>{{$row->jenis}}</td>
                      @if( $row->jenis=="pelanggaran")
                        @if($row->skor <= 500 )
                        <td>
                          <span class="badge bg-primary"><i class="bi bi-star me-1"></i> Aman </span>
                        </td>
                        @elseif($row->skor >= 500)
                        <td >
                          <span class="badge bg-info text-dark"><i class="bi bi-info-circle me-1"></i> SP 1 </span>
                        </td>
                        @elseif($row->skor >= 750)
                        <td >
                          <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> SP 2 </span>
                        </td>
                        @elseif($row->skor >= 1000)
                        <td class="bg-dark text-center text-white">
                          <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Di Keluarkan </span>
                        </td>
                        @endif
                      @else($row->jenis=="prestasi")
                        @if($row->skor <= 1500)
                        <td>
                          <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Biasa </span>
                        </td>
                        @elseif($row->skor >= 1500)
                        <td>
                          <span class="badge bg-primary"><i class="bi bi-star me-1"></i> Baik </span>
                        </td>
                        @elseif($row->skor >= 2000)
                        <td>
                          <span class="badge bg-primary"><i class="bi bi-star me-1"></i> Sangat Baik </span>
                        </td>
                        @elseif($row->skor >= 2500)
                        <td>
                          <span class="badge bg-light text-dark"><i class="bi bi-star me-1"></i> Student Of The Year </span>
                        </td>
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
                @elseif(DB::table('siswas')->where(['username'=>Session::get('username')])->first())
                <tbody>
                  @foreach($monitoring->where('nis',Session::get('nisSiswa')) as $row)
                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                      <td>{{$row->nis}}</td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->skor}}</td>
                      {{-- <td>{{$row->tgl}}</td> --}}
                      <td>{{$row->jenis}}</td>
                      @if( $row->jenis=="pelanggaran")
                        @if($row->skor <= 500 )
                        <td>
                          <span class="badge bg-primary"><i class="bi bi-star me-1"></i> Aman </span>
                        </td>
                        @elseif($row->skor >= 500)
                        <td >
                          <span class="badge bg-info text-dark"><i class="bi bi-info-circle me-1"></i> SP 1 </span>
                        </td>
                        @elseif($row->skor >= 750)
                        <td >
                          <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> SP 2 </span>
                        </td>
                        @elseif($row->skor >= 1000)
                        <td class="bg-dark text-center text-white">
                          <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Di Keluarkan </span>
                        </td>
                        @endif
                      @else($row->jenis=="prestasi")
                        @if($row->skor <= 1500)
                        <td>
                          <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Biasa </span>
                        </td>
                        @elseif($row->skor >= 1500)
                        <td>
                          <span class="badge bg-primary"><i class="bi bi-star me-1"></i> Baik </span>
                        </td>
                        @elseif($row->skor >= 2000)
                        <td>
                          <span class="badge bg-primary"><i class="bi bi-star me-1"></i> Sangat Baik </span>
                        </td>
                        @elseif($row->skor >= 2500)
                        <td>
                          <span class="badge bg-light text-dark"><i class="bi bi-star me-1"></i> Student Of The Year </span>
                        </td>
                        @endif
                      @endif
                      
                    </tr>
                    @endforeach
                </tbody>
                @elseif(DB::table('orangtuas')->where(['username'=>Session::get('username')])->first())
                <tbody>
                  @foreach($monitoring->where('id_ortu',Session::get('ortuId')) as $row)
                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                      <td>{{$row->nis}}</td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->skor}}</td>
                      {{-- <td>{{$row->tgl}}</td> --}}
                      <td>{{$row->jenis}}</td>
                      @if( $row->jenis=="pelanggaran")
                        @if($row->skor <= 500 )
                        <td>
                          <span class="badge bg-primary"><i class="bi bi-star me-1"></i> Aman </span>
                        </td>
                        @elseif($row->skor >= 500)
                        <td >
                          <span class="badge bg-info text-dark"><i class="bi bi-info-circle me-1"></i> SP 1 </span>
                        </td>
                        @elseif($row->skor >= 750)
                        <td >
                          <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> SP 2 </span>
                        </td>
                        @elseif($row->skor >= 1000)
                        <td class="bg-dark text-center text-white">
                          <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Di Keluarkan </span>
                        </td>
                        @endif
                      @else($row->jenis=="prestasi")
                        @if($row->skor <= 1500)
                        <td>
                          <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Biasa </span>
                        </td>
                        @elseif($row->skor >= 1500)
                        <td>
                          <span class="badge bg-primary"><i class="bi bi-star me-1"></i> Baik </span>
                        </td>
                        @elseif($row->skor >= 2000)
                        <td>
                          <span class="badge bg-primary"><i class="bi bi-star me-1"></i> Sangat Baik </span>
                        </td>
                        @elseif($row->skor >= 2500)
                        <td>
                          <span class="badge bg-light text-dark"><i class="bi bi-star me-1"></i> Student Of The Year </span>
                        </td>
                        @endif
                        {{-- notting --}}
                      @endif
                      
                    </tr>
                    @endforeach
                  </tbody>
                @else
                notting
                @endif
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js" integrity="sha512-/n/dTQBO8lHzqqgAQvy0ukBQ0qLmGzxKhn8xKrz4cn7XJkZzy+fAtzjnOQd5w55h4k1kUC+8oIe6WmrGUYwODA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
</script>
@endpush