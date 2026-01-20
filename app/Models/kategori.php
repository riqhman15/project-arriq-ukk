<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'judul',
        'keterangan',
    ];

    public function tempat()
    {
        return $this->hasMany(Tempat::class);
    }
}
