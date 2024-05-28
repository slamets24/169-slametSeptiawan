<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    protected $fillable = [
        'gambar',
        'judul',
        'cerita',
    ];
    public function undangan()
    {
        return $this->belongsTo(Undangan::class, 'id');
    }
}
