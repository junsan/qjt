<?php

namespace App\Models;

use App\Models\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function jobs() {
        return $this->hasMany(Job::class, 'company_id');
    }
}
