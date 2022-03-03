@extends('backend.index')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('simos')}}">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
              <div class="icon" style="float: right; margin-top: -5%; width: 10%;">
                <a href="{{route('siswa.create')}}"><i class="fa-100x ri-add-box-line ml-3 mt-2"></i></a>
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
@endsection