<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $table = 'jenis';

    protected $guarded = [];

    /**
     * [merk description]
     * @return [type] [description]
     */
    public function merk()
    {
        return $this->hasOne(Merk::class);
    }
}
