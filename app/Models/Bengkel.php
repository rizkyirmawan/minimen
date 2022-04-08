<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bengkel extends Model
{
    use HasFactory;

    protected $table = 'bengkel';

    protected $guarded = [];

    public function claim()
    {
        return $this->belongsTo(Claim::class);
    }
}
