<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container table-responsive-sm">
		<h1>Laporan Keseluruhan</h1>
        <br>
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
                @foreach($details as $row)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$row->nis}}</td>
                    <td>{{$row->kode}}</td>
                    <td>{{$row->skor}}</td>
                    @if( $row->jenis=="pelanggaran")
                      @if($row->skor <= 500 )
                      <td>
                        <span> Aman </span>
                      </td>
                      @elseif($row->skor >= 500)
                      <td>
                        <span> SP 1 </span>
                      </td>
                      @elseif($row->skor >= 750)
                      <td >
                        <span> SP 2 </span>
                      </td>
                      @elseif($row->skor >= 1000)
                      <td>
                        <span> Di Keluarkan </span>
                      </td>
                      @endif
                    @else($row->jenis=="prestasi")
                      @if($row->skor <= 1500)
                      <td>
                        <span> Biasa </span>
                      </td>
                      @elseif($row->skor >= 1500)
                      <td>
                        <span> Baik </span>
                      </td>
                      @elseif($row->skor >= 2000)
                      <td>
                        <span > Sangat Baik </span>
                      </td>
                      @elseif($row->skor >= 2500)
                      <td>
                        <span> Student Of The Year </span>
                      </td>
                      @endif
                    @endif
                    <td></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
	</div>
</body>
<script>
          window.print();
</script>
</html>