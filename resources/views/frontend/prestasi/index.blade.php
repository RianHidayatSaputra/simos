@extends('frontend.layouts.front')
@section('titlePage','| Prestasi Tertinggi')
@section('content')
<section id="prestasi_tertinggi" class="prestasi_tertinggi">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Prestasi Tertinggi</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nis</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Skor</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($prestasiTertinggi as $prestasiItem)
                              <tr>
                                <th scope="row"> <i class='bi bi-trophy-fill' ></i> 1</th>
                                <td>{{$prestasiItem->nis}}</td>
                                <td>{{$prestasiItem->name}}</td>
                                <td>{{$prestasiItem->skor}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 

@push('css')
@endpush

@push('jsAdd')
@endpush