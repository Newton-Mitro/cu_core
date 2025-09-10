<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountCustomer extends Model
{
    protected $fillable = ['account_id', 'customer_id', 'role'];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
