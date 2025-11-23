<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelayan extends Model
{
    use HasFactory;

    protected $table = 'pelayan';

    protected $primaryKey = 'ID_Pelayan';

    public $timestamps = false;

    protected $fillable = ['Nama', 'Shift'];
}
