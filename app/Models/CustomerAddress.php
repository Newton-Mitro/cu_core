<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'line1',
        'line2',
        'city',
        'state',
        'postal_code',
        'country_code',
        'type',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
