<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;

    protected $table = 'merk';

    protected $guarded = [];

    public function claim()
    {
        return $this->hasOne(Claim::class);
    }

    public function jenis()
    {
        return $this->hasMany(Jenis::class);
    }
}
