<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_no',
        'type',
        'full_name',
        'registration_no',
        'dob',
        'gender',
        'religion',
        'identification_type',
        'identification_number',
        'photo',
        'phone',
        'email',
        'kyc_level',
        'status',
    ];

    protected $casts = [
        'dob' => 'date',
    ];

    // Relationships
    public function addresses()
    {
        return $this->hasMany(CustomerAddress::class);
    }

    public function familyRelations()
    {
        return $this->hasMany(CustomerFamilyRelation::class, 'customer_id');
    }

    public function relatives()
    {
        return $this->belongsToMany(
            Customer::class,
            'customer_family_relations',
            'customer_id',
            'relative_id'
        )->withPivot('relation_type', 'reverse_relation_type')->withTimestamps();
    }

    public function signatures()
    {
        return $this->hasMany(CustomerSignature::class);
    }
}
