<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'address',
        'latitude',
        'longitude',
        'manager_id',
    ];

    // Relation to manager (User)
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }
}
