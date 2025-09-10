<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanApplicantIncome extends Model
{
    protected $fillable = ['loan_application_id', 'source', 'monthly_amount', 'frequency'];

    public function loanApplication()
    {
        return $this->belongsTo(LoanApplication::class);
    }
}
