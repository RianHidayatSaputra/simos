@extends('backend.index')
@section('content')
 <main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Kode</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('simos')}}">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Kode</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">General Form Kode</h5>

              <!-- General Form Kode -->
              <form action="{{route('kode.store')}}" method="POST">
              	{{csrf_field()}}
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Kode</label>
                  <div class="col-sm-10">
                    <input type="text" name="kode" id="kode" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
                  <div class="col-sm-10">
                    <input type="text" name="deskripsi" id="deskripsi" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Skor</label>
                  <div class="col-sm-10">
                    <input type="number" name="skor" id="skor" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Select</label>
                  <div class="col-sm-10">
                    <select name="jenis" id="jenis" class="form-select" aria-label="Default select example">
                      <option selected>Optio Jenis</option>
                      <option value="prestasi">Prestasi</option>
                      <option value="pelanggaran">Pelanggaran</option>
                    </select>
                  </div>
                </div>
                

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Tombol Kirim</label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Kirim Halaman</button>
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