<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanApproval extends Model
{
    protected $fillable = [
        'loan_application_id',
        'approved_by',
        'approved_amount',
        'interest_rate',
        'repayment_schedule',
        'approved_date'
    ];

    protected $casts = [
        'repayment_schedule' => 'array',
        'approved_date' => 'date',
    ];

    public function loanApplication()
    {
        return $this->belongsTo(LoanApplication::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
