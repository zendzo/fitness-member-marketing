<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'age',
        'interested_package',
        'dob',
        'branch_id',
        'add_by',
    ];

    protected $date = ['dob'];

    public function getAgeAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d', $this->dob)->diffInYears();
    }

    public function remainders()
    {
        return $this->hasMany(Remainder::class)->latest();
    }
}
