<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanApplicantWorkDetail extends Model
{
    protected $fillable = [
        'loan_application_id',
        'employer_name',
        'designation',
        'employment_type',
        'monthly_income',
        'years_of_service'
    ];

    public function loanApplication()
    {
        return $this->belongsTo(LoanApplication::class);
    }
}
