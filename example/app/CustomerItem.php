<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerItem extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'order_id',
        'item_id',
        'name',
        'sku',
        'qty',
        'price',
        'tax_amount',
        'row_total',
        'price_incl_tax',
        'total_incl_tax',
        'tax_percent',
        'amount_package',
        'created_at',
        'updated_at'
    ];

    public function customer() {
        return $this->belongsToMany(Customer::class);
    }

    public function customerOrder() {
        return $this->belongsToMany(CustomerOrder::class);
    }
}
