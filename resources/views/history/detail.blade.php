@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{url('history')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{url('history')}}">Riwayat Pemesanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 ">
            <div class="card  bg-success">
                <div class="card-body">
                    <h3>Sukses Check out</h3>
                    <h5>Pesanan anda berhasil, selanjutnya untuk pembayaran silahkan 
                        transfer di rekening <strong>Bank BRI Nomer Rekening :123243567645</strong>
                        dengan nominal : <strong>Rp. {{number_format($pesanan->kode+$pesanan->jumlah_harga)}}</strong>
                    </h5>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-header d-flex">
                    <div class="col-md-3">
                        <h3><i class="fa fa-shopping-cart"></i>Detail Pemesanan</h3>
                    </div>
                    <div class="col-md-9" align="right">
                     Export to PDF<a  href="{{url('cetak-pdf')}}/{{$pesanan->id}}" class="text-decoration-none" target="_blank"><i class="fa fa-print btn-lg"></i></a>
                    </div>
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
                                    <th>Harga Satuan</th>
                                    <th>Total Harga</th>
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
                                    
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" align="right"><strong>Total Belanja :</strong></td>
                                    <td align="right"><strong>Rp. {{number_format($pesanan->jumlah_harga)}}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="5" align="right"><strong>Kode Unik :</strong></td>
                                    <td align="right"><strong>Rp. {{number_format($pesanan->kode)}}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="5" align="right"><strong>Total yang harus di transfer :</strong></td>
                                    <td align="right"><strong>Rp. {{number_format($pesanan->kode+$pesanan->jumlah_harga)}}</strong></td>
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
