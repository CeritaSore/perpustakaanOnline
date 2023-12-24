<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'bukus';
    protected $fillable = ['judul_buku', 'pengarang_id', 'penerbit_id', 'kategori_id','deskripsi','foto','tahun_terbit'];
    protected $primaryKey = 'idbuku';
    public function pengarang()
    {
        return $this->belongsTo(pengarang::class,'pengarang_id','idpengarang');
    }
    public function penerbit()
    {
        return $this->belongsTo(penerbit::class,'penerbit_id','idpenerbit');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'kategori_id','idkategori');
    }
}
