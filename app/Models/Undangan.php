<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class undangan extends Model
{
    use HasFactory;
    protected $fillable = [
        'judulUndangan',
        'nPanggilPria',
        'nPanggilWanita',
        'idUser',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function mempelaiPria()
    {
        return $this->hasOne(MempelaiPria::class, 'idUndangan');
    }

    public function mempelaiWanita()
    {
        return $this->hasOne(MempelaiWanita::class, 'idUndangan');
    }

    public function acara()
    {
        // mengambil lebih dari 1 data
        return $this->hasMany(Acara::class, 'idUndangan');
    }

    public function documentation()
    {
        return $this->hasOne(Documentation::class, 'idUndangan');
    }

    public function ucapan()
    {
        return $this->hasOne(Ucapan::class, 'idUndangan');
    }
    public function story()
    {
        return $this->hasMany(Story::class, 'idUndangan');
    }
}
