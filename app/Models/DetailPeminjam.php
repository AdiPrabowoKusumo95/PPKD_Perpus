<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\Anggota;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPeminjam extends Model
{
    use HasFactory;
    protected $fillable = ['id_peminjam', 'id_buku', 'tanggal_pinjam', 'tanggal_pengembalian', 'keterangan'];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class,'id_peminjam', 'id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class,'id_buku', 'id');
    }

    
}
