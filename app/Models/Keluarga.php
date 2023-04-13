<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Keluarga extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class);
    }
}
