<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecurringDeposit extends Model
{
    protected $primaryKey = 'account_id';
    public $incrementing = false;

    protected $fillable = [
        'account_id',
        'installment_amount',
        'rate_bp',
        'cycle',
        'start_date',
        'tenor_months'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}

