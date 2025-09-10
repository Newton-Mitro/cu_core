<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanProduct extends Model
{
    protected $fillable = [
        'product_id',
        'gl_principal_id',
        'penalty_bp',
        'schedule_method',
        'max_tenor_months',
        'collateral_required',
        'ltv_percent',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
