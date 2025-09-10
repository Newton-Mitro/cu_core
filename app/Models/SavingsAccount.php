<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavingsAccount extends Model
{
    protected $primaryKey = 'account_id';
    public $incrementing = false;

    protected $fillable = [
        'account_id',
        'balance',
        'min_balance',
        'interest_rate_bp',
        'interest_method'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}

