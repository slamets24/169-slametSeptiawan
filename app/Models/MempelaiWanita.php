<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mempelaiWanita extends Model
{
    use HasFactory;

    protected $fillable = [
        'nmMempelaiWanita',
        'nmIbu',
        'nmBapak',
        'nRekening',
        'noRek',
        'idUndangan'
    ];

    public function undangan()
    {
        return $this->belongsTo(Undangan::class, 'id');
    }
}
