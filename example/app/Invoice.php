<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_date',
        'due_date',
        'customer_id',
        'total_excl_vat',
        'total_vat',
        'total_shipping_excl_vat',
        'total_vat_shipping',
        'grand_total_incl_vat',
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
