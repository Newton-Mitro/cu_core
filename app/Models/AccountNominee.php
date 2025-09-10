<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountNominee extends Model
{
    protected $fillable = ['account_id', 'nominee_id', 'share_percentage'];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function nominee()
    {
        return $this->belongsTo(Customer::class, 'nominee_id');
    }
}

