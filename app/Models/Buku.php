<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'bukus';
    protected $fillable = [
        'nama_buku',
        'penerbit',
        'qty',
        'deskripsi',
        'penulis',
        'genre'
    ];

    public function peminjam()
    {
        return $this->belongsToMany(Peminjaman::class, 'detail_peminjamans', 'buku_id', 'id_peminjam');
    }
}
