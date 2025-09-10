<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'type',
        'code',
        'name',
        'is_active',
        'gl_interest_id',
        'gl_fees_income_id',
    ];

    // Each product may have one specialized subtype
    public function deposit()
    {
        return $this->hasOne(DepositProduct::class);
    }

    public function loan()
    {
        return $this->hasOne(LoanProduct::class);
    }

    public function insurance()
    {
        return $this->hasOne(InsuranceProduct::class);
    }
}

