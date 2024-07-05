<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjams';
    protected $fillable = [
        'id_anggota',
        'no_transaksi'
    ];
    public function anggota() {
        return $this->belongsTo(Anggota::class, 'id_anggota','id');
    }

    public function bukus()
    {
        return $this->belongsToMany(Buku::class, 'detail_peminjamans', 'id_peminjam', 'buku_id');
    }
}
