<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_date',
        'due_date',
        'customer_id',
        'subtotal',
        'tax_amount',
        'shipping_amount',
        'shipping_tax_amount',
        'grand_total',
        'invoice_billed',
        'serial_number',
        'order_id'
        ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function orders() {
        return $this->hasMany(CustomerOrder::class);
    }
}
