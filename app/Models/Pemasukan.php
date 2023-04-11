<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemasukan extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function anggota()
    {
        return $this->belongsTo(User::class);
    }
    public function pengurus()
    {
        return $this->belongsTo(User::class);
    }
}
