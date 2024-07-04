<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\DetailPeminjam;

class TransaksiController extends Controller
{
    public function Peminjaman()    {

        $datas = Peminjaman::get();
        return view('peminjaman.index', compact('datas'));
    }
    public function TambahPeminjaman()
    {
        $kode_transaksi = Peminjaman::orderBy('id', 'desc')->first();
        if(isset($kode_transaksi)){
            $urutan = $kode_transaksi->id;

        }else{
            $urutan = 0;
        }
        $huruf = "TR";
        $urutan++;
        $kode_transaksi = $huruf . date("dmY") . sprintf("%03s", $urutan);
        $peminjams = Anggota::orderBy('id', 'desc')->get();
        $bukus = Buku::get();
        return view('peminjaman.create', compact('peminjams', 'kode_transaksi', 'bukus'));
    }
    public function AksiTambahPeminjaman(Request $request)
    {
        // return $request;
        $peminjam = Peminjaman::create([
            'id_anggota' => $request->id_anggota,
            'no_transaksi' => $request->no_transaksi,
        ]);

        foreach ($request->id_buku as $index => $id_buku) {
            DetailPeminjam::create([
                'id_peminjam' => $peminjam->id,
                'id_buku' => $id_buku,
                'tanggal_pinjam' => $request->tanggal_pinjam[$index],
                'tanggal_pengembalian' => $request->tanggal_pengembalian[$index],
                'keterangan' => $request->keterangan[$index],
            ]);
        };
        return redirect()->to('peminjaman');
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
