<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanApplicationSupportingDoc extends Model
{
    protected $fillable = [
        'loan_application_id',
        'file_name',
        'file_path',
        'mime',
        'document_type',
        'uploaded_at'
    ];

    public function loanApplication()
    {
        return $this->belongsTo(LoanApplication::class);
    }
}
