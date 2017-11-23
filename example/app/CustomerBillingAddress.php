<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerBillingAddress extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'customer_id',
        'customer_address_id',
        'email',
        'firstname',
        'lastname',
        'postcode',
        'street',
        'city',
        'telephone',
        'country_id',
        'address_type',
        'company',
        'country',
        'created_at',
        'updated_at'
    ];

    public function customerOrder() {
        return $this->belongsTo(CustomerOrder::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
