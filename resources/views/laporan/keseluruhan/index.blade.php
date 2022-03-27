@extends('backend.index')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Laporan Keseluruhan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('simos')}}">Home</a></li>
          <li class="breadcrumb-item">Laporan</li>
          <li class="breadcrumb-item active">Keseluruhan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Laporan Keseluruhan</h5>
              <div class="icon" style="float: right; margin-top: -5%; width: 10%;">
                
              </div>
              <div class="input-group input-daterange">
                <div class="col-md-4">
                  <input type="text" name="from_date" id="from_date" readonly class="form-control" placeholder="Start date">
                </div>
                <div class="input-group-addon">to</div>
                <div class="col-md-4">
                  <input type="text" name="to_date" id="to_date" class="form-control" placeholder="finish date">
                </div>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                      <button type="button"  name="filter" id="filter" class="btn btn-info">Cari</button>
                      <button type="button"   name="refresh" id="refresh" class="btn btn-warning">Refresh</button>
                      <button type="button" class="btn btn-primary text-white">
                        <a href="{{route('laporan.keseluruhan.cetak')}}" target="_BLANK" class="text-white">Cetak</a>
                      </button>
                    </div>
              </div>
             <!--  <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->
              <!-- Table with stripped rows -->
              <table class="table datatable" id="datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Point</th>
                    {{-- <th scope="col">Tanggal</th> --}}
                    {{-- <th scope="col">Keterangan</th> --}}
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                <!-- @foreach($details as $row)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$row->nis}}</td>
                    <td>{{$row->kode}}</td>
                    <td>{{$row->skor}}</td>
                    <td>{{$row->jenis}}</td>
                    <td></td>
                  </tr>
                  @endforeach -->
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              {{ csrf_field() }}
            </div>
          </div>
         
        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection
@push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
 <script type="text/javascript">
    $(document).ready(function(){

      var date = new Date();

      $('.input-daterange').datepicker({
      todayBtn: 'linked',
      format: 'dd-mm-yy',
      autoclose: true
      });

      var _token = $('input[name="_token"]').val();

      fetch_data();

      function fetch_data(from_date = '', to_date = '')
      {
      $.ajax({
        url:"{{ route('monitoring.fetch_data') }}",
        method:"POST",
        data:{from_date:from_date, to_date:to_date, _token:_token},
        dataType:"json",
        success:function(data)
        {
        var output = '';
        $('#total_records').text(data.length);
        for(var count = 0; count < data.length; count++)
        {
          output += '<tr>';
          output += '<td>' + count + '</td>';
          output += '<td>' + data[count].nis + '</td>';
          output += '<td>' + data[count].kode + '</td>';
          output += '<td>' + data[count].skor + '</td>';
          output += '<td>' + data[count].jenis + '</td></tr>';
        }
        $('tbody').html(output);
        }
      })
      }

      $('#filter').click(function(){
      var from_date = $('#from_date').val();
      var to_date = $('#to_date').val();
      if(from_date != '' &&  to_date != '')
      {
        fetch_data(from_date, to_date);
      }
      else
      {
        alert('Both Date is required');
      }
      });

      $('#refresh').click(function(){
      $('#from_date').val('');
      $('#to_date').val('');
      fetch_data();
      });


      });

    </script>

$endpush