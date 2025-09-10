<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsuranceProduct extends Model
{
    protected $fillable = [
        'product_id',
        'coverage_type',
        'min_premium',
        'max_premium',
        'premium_cycle',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

