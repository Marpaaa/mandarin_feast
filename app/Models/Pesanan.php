<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    protected $primaryKey = 'ID_Pesanan';
    public $timestamps = false;

    protected $fillable = [
        'ID_Pelanggan',
        'ID_Menu',
        'Jumlah',
        'Catatan',
        'Total',
        'Tanggal',
        'Waktu'
    ];

    // Relasi ke pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'ID_Pelanggan');
    }

    // Relasi ke menu
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'ID_Menu');
    }

    // Relasi ke pembayaran (satu pesanan memiliki satu pembayaran)
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'ID_Pesanan');
    }
}
