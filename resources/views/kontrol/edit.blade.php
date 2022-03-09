@extends('backend.index')
@section('content')
 <main id="main" class="main">

    <div class="pagetitle">
      <h1>Form kontrol</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('simos')}}">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">kontrol</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">General Form kontrol</h5>

              <!-- General Form kontrol -->
              <form action="{{route('kontrol.update',$kontrol->id)}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Select</label>
                  <div class="col-sm-10">
                    <select name="id_siswa" id="id_siswa" class="form-select  " aria-label="Default select example">
                      <option selected>Options Nis</option>
                      <?php foreach($siswa as $row):?>
                      <option value="<?php echo $row['id'];?>"<?php if($row['id'] == $kontrol->id_siswa) echo 'selected="selected"' ?>><?php echo $row['nis']; ?></option>
                      <?php endforeach?>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name Siswa</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" id="name" disabled class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Catatan</label>
                  <div class="col-sm-10">
                    <input type="text" name="catatan" id="catatan" value="{{$kontrol->catatan}}" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">image</label>
                  <div class="col-sm-10">
                     @if($kontrol->image)
                        <img name="image" id="image" src="{{asset('storage/'.$kontrol->image)}}" width="10%" alt=""></td>
                    @endif
                     <input type="file" name="image" id="image" value="{{$kontrol->image}}" placeholder="new picture">
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
    var name = 0;
      var id_siswa = $('#id_siswa').val();
      $.ajax({
        type : "GET",
        url : "{{route('kontrol.data')}}/" + id_siswa,
        success : function(data){
          console.log(data);
          $('#name').val(data.name);
        }
      });
  })

</script>
@endpush