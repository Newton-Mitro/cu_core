<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerFamilyRelation extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'relative_id',
        'relation_type',
        'reverse_relation_type',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function relative()
    {
        return $this->belongsTo(Customer::class, 'relative_id');
    }
}
