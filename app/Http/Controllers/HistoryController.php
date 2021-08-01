<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use Carbon\Carbon;
use App\Pesanan;
use App\User;
use Dompdf\Dompdf;
use App\PesananDetail;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();

        return view('history.index', compact('pesanans'));
    }

    public function detail($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();

        return view('history.detail', compact('pesanan', 'pesanan_details'));
    }

    public function cetak($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();

        return view('printpdf.detailpdf', compact('pesanan', 'pesanan_details'));
    }

}