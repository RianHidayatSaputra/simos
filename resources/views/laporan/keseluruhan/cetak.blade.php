<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container">
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
                    <td>{{$row->jenis}}</td>
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