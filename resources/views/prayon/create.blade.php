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
              <form action="{{route('prayon.store')}}" method="POST">
              	{{csrf_field()}}
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Select Rayon</label>
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
                      <option selected>Options Guru</option>
                      @foreach($guru as $row)
                      <option value="{{$row->id}}">{{$row->name}}</option>
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
                    <input type="text" name="password" id="password" class="form-control">
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