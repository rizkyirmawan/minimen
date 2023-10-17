<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $table = 'foto';

    protected $guarded = [];

    /**
     * [claim description]
     * @return [type] [description]
     */
    public function claim()
    {
        return $this->belongsTo(Claim::class);
    }
}
