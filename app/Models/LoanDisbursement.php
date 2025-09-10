<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanDisbursement extends Model
{
    protected $fillable = ['loan_application_id', 'disbursement_date', 'amount', 'account_id'];

    protected $casts = [
        'disbursement_date' => 'date',
    ];

    public function loanApplication()
    {
        return $this->belongsTo(LoanApplication::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
