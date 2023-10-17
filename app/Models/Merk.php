<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;

    protected $table = 'merk';

    protected $guarded = [];

    /**
     * [claim description]
     * @return [type] [description]
     */
    public function claim()
    {
        return $this->hasOne(Claim::class);
    }

    /**
     * [jenis description]
     * @return [type] [description]
     */
    public function jenis()
    {
        return $this->hasMany(Jenis::class);
    }
}
