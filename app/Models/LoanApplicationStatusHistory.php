<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanApplicationStatusHistory extends Model
{
    protected $fillable = ['loan_application_id', 'status', 'changed_by', 'changed_at'];

    protected $casts = [
        'changed_at' => 'datetime',
    ];

    public function loanApplication()
    {
        return $this->belongsTo(LoanApplication::class);
    }

    public function changedBy()
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}
