<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    protected $fillable = [
        'customer_id',
        'product_id',
        'account_id',
        'loan_type',
        'amount_requested',
        'purpose',
        'application_date',
        'status'
    ];

    // Relationships
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function sureties()
    {
        return $this->hasMany(LoanSurety::class);
    }

    public function collaterals()
    {
        return $this->hasMany(LoanCollateral::class);
    }

    public function guarantors()
    {
        return $this->hasMany(LoanGuarantor::class);
    }

    public function workDetails()
    {
        return $this->hasOne(LoanApplicantWorkDetail::class);
    }

    public function assets()
    {
        return $this->hasMany(LoanApplicantAsset::class);
    }

    public function incomes()
    {
        return $this->hasMany(LoanApplicantIncome::class);
    }

    public function expenses()
    {
        return $this->hasMany(LoanApplicantExpense::class);
    }

    public function supportingDocs()
    {
        return $this->hasMany(LoanApplicationSupportingDoc::class);
    }

    public function approvals()
    {
        return $this->hasMany(LoanApproval::class);
    }

    public function disbursements()
    {
        return $this->hasMany(LoanDisbursement::class);
    }

    public function statusHistory()
    {
        return $this->hasMany(LoanApplicationStatusHistory::class);
    }
}
