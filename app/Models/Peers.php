<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peers extends Model
{
    use HasFactory;
    protected $primaryKey = 'uuid';
    protected $casts = [
        'uuid' => 'string', 
    ];
    protected $guarded = [];
}
