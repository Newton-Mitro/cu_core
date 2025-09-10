<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class OnlineUser extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'username',
        'email',
        'phone',
        'password',
        'last_login_at',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'last_login_at' => 'datetime',
    ];

    public function member()
    {
        return $this->belongsTo(Customer::class, 'member_id'); // assuming 'members' is 'customers'
    }
}
