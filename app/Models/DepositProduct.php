<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepositProduct extends Model
{
    protected $fillable = [
        'product_id',
        'gl_control_id',
        'interest_method',
        'rate_bp',
        'min_opening_amount',
        'lock_in_days',
        'penalty_break_bp',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
