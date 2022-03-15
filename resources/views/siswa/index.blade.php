@extends('backend.index')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Siswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('simos')}}">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Siswa</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            {{-- <div class="card-header">
              {{-- <h5 class="card-title">Siswa</h5>
              <div class="card-tools" style="float: right;">
                <button type="button" class="btn btn-primary text-white">
                  <a href="{{route('siswa.create')}}" class="text-white">Add Data</a>                
                </button>
              </div> --}}
            {{-- </div> --}}
            <div class="card-body">
              <h5 class="card-title">Siswa</h5>
              <div class="icon" style="float: right; margin-right:10%; margin-top: -5%; width: 10%;">
                {{-- <a href="{{route('siswa.create')}}">Add Data</a> --}}
                <div class="btn-group">
                  <a href="{{route('siswa.create')}}" class="btn btn-primary" >Add</a>
                  <a href="{{route('siswa.export')}}" class="btn btn-primary"><i class="bi bi-download"></i></a>
                  <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-upload"></i></a>
                  {{-- <button class="btn btn-primary"><i class="bi bi-upload"></i></button> --}}
                  {{-- <a href="{{route('siswa.create')}}"><i class="bi bi-add"></i></a> --}}
                </div>
                
              </div>
             <!--  <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->
              

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Name</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">NO Telepon</th>
                    <th scope="col">Rombel</th>
                    <th scope="col">Username</th>
                    <th scope="col">Name Ortu</th>
                    <th scope="col">Rayon</th>
                    <th scope="col">Name Guru</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($siswa as $row)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$row->nis}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->alamat}}</td>
                    <td>{{$row->no_telp}}</td>
                    <td>{{$row->rombel}}</td>
                    <td>{{$row->username}}</td>
                    <td>{{$row->ortu_name}}</td>
                    <td>{{$row->rayon}}</td>
                    <td>{{$row->guru_name}}</td>

                    <td>
                                        <a href="{{route('siswa.edit',$row->id)}}" class="btn btn-sm btn-primary demo-google-material-icon"><i class="bi bi-pencil"></i></a>
                                        <a href="{{route('siswa.delete',$row->id)}}" onclick="return confirm('apa kamu serius?')" class="btn btn-sm btn-danger demo-google-material-icon"><i class="bi bi-trash"></i>  </a>
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
  <div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Import Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('siswa.import')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="modal-body">
                    {{-- <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label">import</label>
                      <div class="col-sm-10">
                        <input type="file" name="file"  id="file"  class="form-control">
                      </div>
                    </div> --}}
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label">Import</label>
                      <div class="col-sm-10">
                        <input type="file" name="file"  id="file" class="form-control">
                      </div>
                    </div>
            </div>
            <div class="modal-footer">
              <a href="" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
              <button type="submit" class="btn btn-primary">Import</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection
