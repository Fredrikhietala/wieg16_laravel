<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    protected $table = "customer_address";
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        "id",
        "customer_id",
        "customer_address_id",
        "email",
        "firstname",
        "lastname",
        "postcode",
        "street",
        "city",
        "telephone",
        "country_id",
        "address_type",
        "company",
        "country"
    ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
