<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    use HasFactory;
    protected $fillable = [
        'namaAcara',
        'tglAcara',
        'kecamatan',
        'kota',
        'provinsi',
        'alamatLengkap',
        'aMulai',
        'aSelesai',
        'linkGmaps',
        'embedGmaps',
        'idUndangan'
    ];

    public function undangan()
    {
        return $this->belongsTo(Undangan::class, 'id');
    }
}
