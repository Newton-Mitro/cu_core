<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanCollateral extends Model
{
    protected $fillable = ['loan_application_id', 'collateral_type', 'reference', 'value', 'description'];

    public function loanApplication()
    {
        return $this->belongsTo(LoanApplication::class);
    }
}
