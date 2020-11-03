<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remainder extends Model
{
    use HasFactory;

    public function getStatusAttribute($value)
    {
        return ucfirst($value);
    }
}
