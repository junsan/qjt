<?php

namespace App\Models;

use App\Models\Company;
use App\Models\Category;
use App\Models\Industry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'industry_id',
        'category_id',
        'title',
        'country',
        'vacancies',
        'employment',
        'description',
        'requirements'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query, array $filters) {

        if ($filters['query'] != '' && !empty($filters['categories']) && !empty($filters['industries'])) {

            $query->where(function($query) use ($filters) {
                    $query->where('title', 'like', '%'. request('query').'%')
                        ->orWhere('requirements', 'like', '%'. request('query').'%')
                        ->whereIn('category_id', $filters['categories'])
                        ->whereIn('industry_id', $filters['industries']);
                });

        } else if ($filters['query'] != '' && !empty($filters['categories'])) {

            $query->where('title', 'like', '%'. request('query').'%')->where(function($query) use ($filters) {
                    $query->whereIn('category_id', $filters['categories'])
                        ->orWhere('requirements', 'like', '%'. request('query').'%');
                });

        } else if ($filters['query'] != '' && !empty($filters['industries'])) {

            $query->where('title', 'like', '%'. request('query').'%')->where(function($query) use ($filters) {
                $query->whereIn('industry_id', $filters['industries'])
                    ->orWhere('requirements', 'like', '%'. request('query').'%');
            });
        
        } else if (!empty($filters['categories']) && !empty($filters['industries'])) {

            $query->where(function($query) use ($filters) {
                    $query->whereIn('category_id', $filters['categories'])
                        ->whereIn('industry_id', $filters['industries']);
                });
     
        } else if($filters['query'] != '') {

            $query->where('title', 'like', '%' . request('query') . '%')
                ->orWhere('requirements', 'like', '%'. request('query').'%');

        } else if (!empty($filters['categories'])) {

            $query->whereIn('category_id', $filters['categories']);
            
        } else if (!empty($filters['industries'])) {
            
            $query->whereIn('industry_id', $filters['industries']);
        }

    }
}
