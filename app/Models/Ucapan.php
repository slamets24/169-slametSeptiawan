<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ucapan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'ucapan',
        'idUndangan',
    ];

    public function undangan()
    {
        return $this->belongsTo(Undangan::class, 'id');
    }
}
