<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShareAccount extends Model
{
    protected $primaryKey = 'account_id';
    public $incrementing = false;

    protected $fillable = ['account_id', 'total_shares', 'share_price'];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}

