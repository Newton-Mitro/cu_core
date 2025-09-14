<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'branch_id',
        'name',
        'email',
        'password',
        'status',
        'employee_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',

    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relation to branch
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    // Relation to employee
    // public function employee()
    // {
    //     return $this->belongsTo(Employee::class);
    // }
}
