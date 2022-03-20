@extends('backend.index')
@section('content')
 <main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Rayon</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('simos')}}">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Rayon</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">General Form Rayon</h5>

              <!-- General Form Guru -->
              <form action="{{route('rayon.update',$rayon->id)}}" method="POST">
              	{{csrf_field()}}
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Rayon</label>
                  <div class="col-sm-10">
                    <input type="text" name="rayon" id="rayon" value="{{$rayon->rayon}}" class="form-control">
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