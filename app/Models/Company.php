<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'industry_id',
        'name',
        'address',
        'employees',
        'logo',
        'website',
        'description'
    ];

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }
}
