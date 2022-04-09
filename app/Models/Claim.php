<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $table = 'claim';

    protected $guarded = [];

    public function merk()
    {
        return $this->belongsTo(Merk::class);
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    public function bengkel()
    {
        return $this->hasOne(Bengkel::class);
    }

    public function foto()
    {
        return $this->hasMany(Foto::class);
    }
}
