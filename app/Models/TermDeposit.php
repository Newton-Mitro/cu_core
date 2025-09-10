<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TermDeposit extends Model
{
    protected $primaryKey = 'account_id';
    public $incrementing = false;

    protected $fillable = [
        'account_id',
        'principal',
        'rate_bp',
        'start_date',
        'maturity_date',
        'compounding',
        'auto_renew'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
