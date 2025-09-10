<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanGuarantor extends Model
{
    protected $fillable = ['loan_application_id', 'customer_id'];

    public function loanApplication()
    {
        return $this->belongsTo(LoanApplication::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
