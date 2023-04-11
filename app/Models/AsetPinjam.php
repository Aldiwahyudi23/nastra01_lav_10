<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AsetPinjam extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function aset()
    {
        return $this->belongsTo(Aset::class);
    }
    public function anggota()
    {
        return $this->belongsTo(User::class);
    }
}
