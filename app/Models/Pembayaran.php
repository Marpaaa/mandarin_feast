<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $primaryKey = 'ID_Pembayaran';
    public $timestamps = false;

    protected $fillable = [
        'ID_Pesanan',
        'Metode_Pembayaran',
        'Total_Bayar',
        'Waktu_Bayar',
    ];

    // Relasi ke tabel pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'ID_Pesanan', 'ID_Pesanan');
    }
}
