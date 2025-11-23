<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu'; // pastikan sesuai nama tabel

    protected $primaryKey = 'ID_Menu';

    public $timestamps = false;

    protected $fillable = [
        'Nama_Menu', 'Gambar', 'Jenis', 'Harga', 'Status_Ketersediaan'
    ];
}
