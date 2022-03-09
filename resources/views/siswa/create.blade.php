@extends('backend.index')
@section('content')
 <main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Siswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('simos')}}">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Siswa</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">General Form Siswa</h5>

              <!-- General Form Siswa -->
              <form action="{{route('siswa.store')}}" method="POST">
              	{{csrf_field()}}
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">nis</label>
                  <div class="col-sm-10">
                    <input type="number" name="nis" id="nis" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" id="name" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" name="alamat" id="alamat" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">No Telepon</label>
                  <div class="col-sm-10">
                    <input type="number" name="no_telp" id="no_telp" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Select</label>
                  <div class="col-sm-10">
                    <select name="id_rombel" id="id_rombel" class="form-select" aria-label="Default select example">
                      <option selected>Options Rombel</option>
                      @foreach($rombel as $row)
                      <option value="{{$row->id}}">{{$row->rombel}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" name="username" id="username" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" id="password" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Select Ortu</label>
                  <div class="col-sm-10">
                    <select name="id_ortu" id="id_ortu" class="form-select" aria-label="Default select example">
                      <option selected>Name Orang Tua</option>
                      @foreach($ortu as $row)
                      <option value="{{$row->id}}">{{$row->nama_ortu}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Select Rayon </label>
                  <div class="col-sm-10">
                    <select name="id_rayon" id="id_rayon" class="form-select" aria-label="Default select example">
                      <option selected>Options Rayon</option>
                      @foreach($rayon as $row)
                      <option value="{{$row->id}}">{{$row->rayon}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Select Guru</label>
                  <div class="col-sm-10">
                    <select name="id_guru" id="id_guru" class="form-select" aria-label="Default select example">
                      <option selected>Name Guru</option>
                      @foreach($guru as $row)
                      <option value="{{$row->id}}">{{$row->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Submit Button</label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit Form</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection