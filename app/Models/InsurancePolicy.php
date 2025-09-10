<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsurancePolicy extends Model
{
    protected $primaryKey = 'account_id';
    public $incrementing = false;

    protected $fillable = [
        'account_id',
        'policy_no',
        'start_date',
        'end_date',
        'premium_amount',
        'premium_cycle',
        'status',
        'beneficiary'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
