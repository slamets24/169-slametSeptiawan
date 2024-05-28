<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documentation extends Model
{
    use HasFactory;

    protected $fillable = [
        'fFormalPria',
        'fFormalWanita',
        'fWedding'
    ];

    public function undangan()
    {
        return $this->belongsTo(Undangan::class, 'id');
    }
}
