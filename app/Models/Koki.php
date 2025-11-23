<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Koki extends Model
{
    protected $table = 'koki';
    protected $primaryKey = 'ID_Koki';

    protected $fillable = [
        'Nama',
        'Shift',
    ];

    public $timestamps = false;
}
