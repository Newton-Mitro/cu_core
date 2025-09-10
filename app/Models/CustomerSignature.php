<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSignature extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'signature_path',
        'role',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
