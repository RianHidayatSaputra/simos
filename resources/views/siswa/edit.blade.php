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
              <form action="{{route('siswa.update',$siswa->id)}}" method="POST">
                {{csrf_field()}}
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">nis</label>
                  <div class="col-sm-10">
                    <input type="number" name="nis" value="{{$siswa->nis}}" id="nis" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" id="name" value="{{$siswa->name}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" name="alamat" id="alamat" value="{{$siswa->alamat}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">No Telepon</label>
                  <div class="col-sm-10">
                    <input type="number" name="no_telp" id="no_telp" value="{{$siswa->no_telp}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Select</label>
                  <div class="col-sm-10">
                    <select name="id_rombel" id="id_rombel" class="form-select" aria-label="Default select example">
                      <option selected>Options Rombel</option>
                      <?php foreach($rombel as $row):?>
                      <option value="<?php echo $row['id'];?>"<?php if($row['id'] == $siswa->id_rombel) echo 'selected="selected"' ?>><?php echo $row['rombel']; ?></option>
                      <?php endforeach?>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" name="username" id="username" value="{{$siswa->username}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" id="password" value="" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Select</label>
                  <div class="col-sm-10">
                    <select name="id_ortu" id="id_ortu" class="form-select" aria-label="Default select example">
                      <option selected>Name Orang Tua</option>
                      @foreach($ortu as $row)
                      <option value="<?php echo $row['id'];?>"<?php if($row['id'] == $siswa->id_ortu) echo 'selected="selected"' ?>><?php echo $row['nama_ortu']; ?></option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Select</label>
                  <div class="col-sm-10">
                    <select name="id_rayon" id="id_rayon" class="form-select" aria-label="Default select example">
                      <option selected>Options Rayon</option>
                      @foreach($rayon as $row)
                      <option value="<?php echo $row['id'];?>"<?php if($row['id'] == $siswa->id_rayon) echo 'selected="selected"' ?>><?php echo $row['rayon']; ?></option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Select</label>
                  <div class="col-sm-10">
                    <select name="id_guru" id="id_guru" class="form-select" aria-label="Default select example">
                      <option selected>Name Guru</option>
                      @foreach($guru as $row)
                      <option value="<?php echo $row['id'];?>"<?php if($row['id'] == $siswa->id_guru) echo 'selected="selected"' ?>><?php echo $row['name']; ?></option>
                      @endforeach
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