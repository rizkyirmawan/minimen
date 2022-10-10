<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $table = 'claim';

    protected $guarded = [];

    /**
     * [merk description]
     * @return [type] [description]
     */
    public function merk()
    {
        return $this->belongsTo(Merk::class);
    }

    /**
     * [jenis description]
     * @return [type] [description]
     */
    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    /**
     * [jenis description]
     * @return [type] [description]
     */
    public function bengkel()
    {
        return $this->hasOne(Bengkel::class);
    }

    /**
     * [jenis description]
     * @return [type] [description]
     */
    public function foto()
    {
        return $this->hasMany(Foto::class);
    }
}
