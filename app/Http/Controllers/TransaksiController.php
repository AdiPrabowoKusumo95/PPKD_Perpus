<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\DetailPeminjam;

class TransaksiController extends Controller
{
    public function peminjaman()
    {

        $datas = Peminjaman::get();
        return view('peminjaman.index', compact('datas'));
    }
    public function tambahpeminjaman()
    {
        $kode_transaksi = Peminjaman::orderBy('id', 'desc')->first();
        if (isset($kode_transaksi)) {
            $urutan = $kode_transaksi->id;
        } else {
            $urutan = 0;
        }
        $huruf = "TR";
        $urutan++;
        $kode_transaksi = $huruf . date("dmY") . sprintf("%03s", $urutan);
        $peminjams = Anggota::get();
        $bukus = Buku::get();
        return view('peminjaman.create', compact('peminjams', 'kode_transaksi', 'bukus'));
    }
    public function aksitambahpeminjaman(Request $request)
    {
        if ($request->id_buku) {
            $peminjam = Peminjaman::create([
                'id_anggota' => $request->id_anggota,
                'no_transaksi' => $request->no_transaksi,
            ]);
           
            $buku = $request->id_buku;
            foreach ($buku as $index => $id_buku) {
                DetailPeminjam::create([
                    'id_peminjam' => $peminjam->id,
                    'id_buku' => $id_buku,
                    'tanggal_pinjam' => date('d-m-Y'), $request->tanggal_pinjam[$index],
                    'tanggal_pengembalian' => date('d-m-Y'), $request->tanggal_pengembalian[$index],
                    'keterangan' => $request->keterangan[$index],
                ]);
            };
            return redirect()->to('peminjaman');
        } else {
            alert()->warning('WarningAlert', 'Data harus diisi terlebih dahulu!');
            return redirect()->to('tambah-peminjaman');
        }
        // return $request;

    }
    public function showpeminjaman(string $id)
    {
        $detailbuku = DetailPeminjam::where('id_peminjam', $id)
            ->get();
        return view('peminjaman.detail', compact('detailbuku'));
    }
    public function deletepeminjaman()
    {
    }

    public function pengembalian()
    {
    }
}
