<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanAccount extends Model
{
    protected $primaryKey = 'account_id';
    public $incrementing = false;

    protected $fillable = [
        'account_id',
        'principal_amount',
        'outstanding_amount',
        'rate_bp',
        'start_date',
        'end_date',
        'schedule_method',
        'collateral_required',
        'ltv_percent',
        'penalty_bp',
        'status'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}

