<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengajuan extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function anggota()
    {
        return $this->belongsTo(User::class);
    }
    public function pengaju()
    {
        return $this->belongsTo(User::class);
    }

    public function pengeluaran()
    {
        return $this->belongsTo(Pengeluaran::class);
    }
    public function pemasukan()
    {
        return $this->belongsTo(Pemasukan::class);
    }
}
