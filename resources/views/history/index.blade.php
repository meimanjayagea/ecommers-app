@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{url('home')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Histori</li>
                </ol>
            </nav>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4><i class="fa fa-history"></i>History</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Tanggal</td>
                                <td>Status</td>
                                <td>Jumlah Harga</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pesanans as $num=>$pesanan)
                            <tr>
                                <td>{{$num+1}}</td>
                                <td>{{$pesanan->tanggal}}</td>
                                <td>@if ($pesanan->status == 1)
                                    Sudah Pesan & Belum Dibayar
                                    @else
                                    Sudah Dibayar
                                    @endif
                                </td>
                                <td>Rp. {{number_format($pesanan->jumlah_harga+$pesanan->kode)}}</td>
                                <td>
                                    <a href="{{url('history')}}/{{$pesanan->id}}" class="btn btn-info">
                                    <i class="fa fa-info">Detail</i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
