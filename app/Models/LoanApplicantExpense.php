<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanApplicantExpense extends Model
{
    protected $fillable = ['loan_application_id', 'category', 'monthly_amount'];

    public function loanApplication()
    {
        return $this->belongsTo(LoanApplication::class);
    }
}
