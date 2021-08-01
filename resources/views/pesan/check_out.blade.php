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
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3><i class="fa fa-shopping-cart"></i>Check Out</h3>
                </div>

                <div class="card-body">
                    <div class="col-md-12">
                        @if (!empty($pesanan))
                        <p align="right">Tanggal Pesanan : {{$pesanan->tanggal}} </p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?=$num = 1?>
                                @foreach ($pesanan_details as $pdetail)
                                <tr>
                                    <td scope="row">{{$num++}}</td>
                                    <td>
                                       <img src="{{url('uploads')}}/{{$pdetail->barang->gambar}}" width="80" height="80">
                                    </td>
                                    <td>{{$pdetail->barang->nama_barang}}</td>
                                    <td>{{$pdetail->jumlah}}</td>
                                    <td align="left">Rp. {{number_format($pdetail->barang->harga)}}</td>
                                    <td align="left">Rp. {{number_format($pdetail->jumlah_harga)}}</td>
                                    <td>
                                        <form action="{{url('check_out')}}/{{$pdetail->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="
                                            return confirm('Anda Yakin Ingin Menghapus data?');">
                                            <i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" align="right"><strong>Total Belanja :</strong></td>
                                    <td><strong>Rp. {{number_format($pesanan->jumlah_harga)}}</strong></td>
                                    <td>
                                        <a href="{{url('konfirmasi-check-out')}}" class="btn btn-success" onclick="
                                            return confirm('Anda Yakin Ingin Chack Out?');">
                                            <i class="fa fa-shopping-cart"></i>Check Out
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
