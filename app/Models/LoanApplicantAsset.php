<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanApplicantAsset extends Model
{
    protected $fillable = ['loan_application_id', 'asset_type', 'description', 'value'];

    public function loanApplication()
    {
        return $this->belongsTo(LoanApplication::class);
    }
}
