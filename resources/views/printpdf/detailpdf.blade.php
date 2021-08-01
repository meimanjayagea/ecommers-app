@extends('layouts.app')

@section('content')
<body onload="window.print();">
<div class="container" >
    <div class="row">
        <div class="col-md-12 ">
            <div class="card mt-2">
                <div class="card-body">
                    <div class="col-md-12">
                        @if (!empty($pesanan))
                        <div class="col-md-12 justify-content-center">
                            <img src="{{url('images/logo.png')}}"  width="300"/><br>
                            <h6 class="mt-3 ml-3">Alamat :<Strong>Jl. Mawar Kadirojo 2</Strong></h6>
                            <h6 class="ml-3">Contak : <Strong>092332458378</Strong></h6>
                        </div>
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
                                @foreach ($pesanan_details as $num=>$pdetail)
                                <tr>
                                    <td scope="row">{{$num+1}}</td>
                                    <td>
                                        <img src="{{url('uploads')}}/{{$pdetail->barang->gambar}}" width="80"
                                            height="80">
                                    </td>
                                    <td>{{$pdetail->barang->nama_barang}}</td>
                                    <td>{{$pdetail->jumlah}}</td>
                                    <td align="left">Rp. {{number_format($pdetail->barang->harga)}}</td>
                                    <td align="left">Rp. {{number_format($pdetail->jumlah_harga)}}</td>

                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" align="right"><strong>Total Belanja :</strong></td>
                                    <td align="right"><strong>Rp. {{number_format($pesanan->jumlah_harga)}}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" align="right"><strong>Kode Unik :</strong></td>
                                    <td align="right"><strong>Rp. {{number_format($pesanan->kode)}}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="5" align="right"><strong>Total yang harus di transfer :</strong></td>
                                    <td align="right"><strong>Rp.
                                            {{number_format($pesanan->kode+$pesanan->jumlah_harga)}}</strong></td>
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
</body>
@endsection
