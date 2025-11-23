<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    use HasFactory;

    protected $table = 'kasir'; // Pastikan nama tabel sesuai

    protected $primaryKey = 'ID_Kasir';

    public $timestamps = false;

    protected $fillable = [
        'Nama',
        'Shift',
    ];
}
