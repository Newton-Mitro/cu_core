<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    protected $fillable = [
        'account_no',
        'customer_id',
        'product_id',
        'branch_id',
        'type',
        'status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function holders(): HasMany
    {
        return $this->hasMany(AccountCustomer::class);
    }

    public function introducers(): HasMany
    {
        return $this->hasMany(AccountIntroducer::class);
    }

    public function nominees(): HasMany
    {
        return $this->hasMany(AccountNominee::class);
    }

    public function signatories(): HasMany
    {
        return $this->hasMany(AccountSignatory::class);
    }

    public function savings()
    {
        return $this->hasOne(SavingsAccount::class);
    }
    public function termDeposit()
    {
        return $this->hasOne(TermDeposit::class);
    }
    public function recurringDeposit()
    {
        return $this->hasOne(RecurringDeposit::class);
    }
    public function shareAccount()
    {
        return $this->hasOne(ShareAccount::class);
    }
    public function loanAccount()
    {
        return $this->hasOne(LoanAccount::class);
    }
    public function insurancePolicy()
    {
        return $this->hasOne(InsurancePolicy::class);
    }
}
