<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Industry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function companies() {
        return $this->hasMany(Company::class, 'industry_id');
    }
}
