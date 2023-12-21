<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;
    protected $primaryKey = 'idpenerbit';
    protected $table = 'penerbits';
    protected $fillable = ['nama_penerbit'];
}
