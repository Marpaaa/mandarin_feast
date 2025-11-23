<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'ID_Pelanggan';
    public $timestamps = false;

    protected $fillable = [
        'Nama',
        'Nomor_Telepon',
        'Tipe_Kunjungan',
        'No_Meja'
    ];
}
