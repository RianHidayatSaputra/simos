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
              <form action="{{route('monitoring.store')}}" method="POST">
              	{{csrf_field()}}
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Select Nis</label>
                  <div class="col-sm-10">
                    <select name="id_siswa" id="id_siswa" class="form-select" aria-label="Default select example">
                      <option selected>Options Nis</option>
                      @foreach($siswa as $row)
                      <option value="{{$row->id}}">{{$row->nis}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Select Kode</label>
                  <div class="col-sm-10">
                    <select name="id_kode" id="id_kode" class="form-select" aria-label="Default select example">
                      <option selected>Options Kode</option>
                      @foreach($kode as $row)
                      <option value="{{$row->id}}">{{$row->kode}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Kode Skor</label>
                  <div class="col-sm-10">
                    <input type="text" name="skor" id="skor" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tanggal</label>
                  <div class="col-sm-10">
                    <input type="text" name="tgl" value="{{ date('d-m-Y'); }}" id="tgl"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Keterangan</label>
                  <div class="col-sm-10">
                    <input type="text" name="keterangan" id="keterangan" class="form-control">
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
@push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js" integrity="sha512-/n/dTQBO8lHzqqgAQvy0ukBQ0qLmGzxKhn8xKrz4cn7XJkZzy+fAtzjnOQd5w55h4k1kUC+8oIe6WmrGUYwODA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $('document').ready(function(){
    var skor = 0;
    $('#id_kode').on('change',function(){
      var id_kode = $(this).val();
      $.ajax({
        type : "GET",
        url : "{{route('kode.data')}}/" + id_kode,
        success : function(data){
          console.log(data);
          $('#skor').val(data.skor);
        }
      });
    })
  })

</script>
@endpush