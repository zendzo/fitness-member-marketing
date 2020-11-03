<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remainder extends Model
{
    use HasFactory;

    protected $fillable = [
    'lead_id',
    'user_id',
    'remainder',
    'note',
    'remainder_date',
    'status',
    ];

    public function getStatusAttribute($value)
    {
        return ucfirst($value);
    }
}
