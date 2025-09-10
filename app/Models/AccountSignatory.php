<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountSignatory extends Model
{
    protected $fillable = [
        'account_id',
        'customer_id',
        'signature_path',
        'mandate',
        'is_active'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
