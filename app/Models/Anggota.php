<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\AnggotaKeluarga;

class Anggota extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function AnggotaKluarga()
    {
        return $this->belongsTo(AnggotaKeluarga::class);
    }
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
