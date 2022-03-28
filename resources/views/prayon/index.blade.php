@extends('backend.index')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Data Pembimbing Rayon</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('simos')}}">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Pembimbing Rayon</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Pembimbing Rayon</h5>
              <div class="icon" style="float: right; margin-top: -5%; width: 10%;">
                <button type="button" class="btn btn-primary text-white">
                  <a href="{{route('prayon.create')}}" class="text-white">Add</a>
                </button>
                <!-- <a href="{{route('prayon.create')}}"><i class="fa-100x ri-add-box-line ml-3 mt-2"></i></a> -->
              </div>
             <!--  <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->
              <!-- Table with stripped rows -->
              <div class="table-responsive-sm">
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">rayon</th>
                    <th scope="col">Pembimbing rayon</th>
                    <th scope="col">Username</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($prayon as $row)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$row->rayon}}</td>
                    <td>{{$row->perayon}}</td>
                    <td>{{$row->username}}</td>
                    <td>
                        <a href="{{route('prayon.edit',$row->id)}}" class="btn btn-sm btn-primary demo-google-material-icon"><i class="bi bi-pencil"></i></a>
                        <a href="{{route('prayon.delete',$row->id)}}" onclick="return confirm('apa kamu serius?')" class="btn btn-sm btn-danger demo-google-material-icon"><i class="bi bi-trash"></i>  </a>
                    </td>
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