<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountIntroducer extends Model
{
    protected $fillable = ['account_id', 'introducer_customer_id'];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function introducer()
    {
        return $this->belongsTo(Customer::class, 'introducer_customer_id');
    }
}

