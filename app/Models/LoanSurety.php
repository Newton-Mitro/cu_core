<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanSurety extends Model
{
    protected $fillable = ['loan_application_id', 'account_id', 'surety_type', 'amount'];

    public function loanApplication()
    {
        return $this->belongsTo(LoanApplication::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
