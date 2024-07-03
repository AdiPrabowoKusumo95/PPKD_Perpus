<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function Peminjaman()    {

        $datas = Peminjaman::get();
        return view('peminjaman.index', compact('datas'));
    }
    public function TambahPeminjaman()
    {
        $kode_transaksi = Peminjaman::orderBy('id', 'desc')->first();
        $huruf = "TR";
        $urutan = $kode_transaksi->id;
        $urutan++;
        $kode_transaksi = $huruf . date("dmY") . sprintf("%03s", $urutan);
        $peminjams = Anggota::orderBy('id', 'desc')->get();
        $bukus = Buku::get();
        return view('peminjaman.create', compact('peminjams', 'kode_transaksi', 'bukus'));
    }
    public function AksiTambahPeminjaman(Request $request)
    {
        Peminjaman::create($request->all());

        return redirect()->route('peminjaman');

    }
    public function ShowPeminjaman()
    {
        return view('peminjaman.detail');
    }
    public function DeletePeminjaman()
    {

    }

    public function Pengembalian()
    {

    }


}
