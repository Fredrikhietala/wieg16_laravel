<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CustomerOrder
 *
 * @property-read \App\Customer $customer
 * @property-read \App\CustomerBillingAddress $customerBillingAddress
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\CustomerItem[] $customerItems
 * @property-read \App\CustomerShippingAddress $customerShippingAddress
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $increment_id
 * @property int|null $customer_id
 * @property string|null $customer_email
 * @property string|null $status
 * @property string|null $marking
 * @property float|null $grand_total
 * @property float|null $subtotal
 * @property float|null $tax_amount
 * @property int|null $billing_address_id
 * @property int|null $shipping_address_id
 * @property string|null $shipping_method
 * @property float|null $shipping_amount
 * @property float|null $shipping_tax_amount
 * @property string|null $shipping_description
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerOrder whereBillingAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerOrder whereCustomerEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerOrder whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerOrder whereGrandTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerOrder whereIncrementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerOrder whereMarking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerOrder whereShippingAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerOrder whereShippingAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerOrder whereShippingDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerOrder whereShippingMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerOrder whereShippingTaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerOrder whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerOrder whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerOrder whereTaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerOrder whereUpdatedAt($value)
 */
class CustomerOrder extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'increment_id',
        'customer_id',
        'customer_email',
        'status',
        'marking',
        'grand_total',
        'subtotal',
        'tax_amount',
        'billing_address_id',
        'shipping_address_id',
        'shipping_method',
        'shipping_amount',
        'shipping_tax_amount',
        'shipping_description',
        'created_at',
        'updated_at'
    ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function customerBillingAddress() {
        return $this->hasOne(CustomerBillingAddress::class);
    }

    public function customerShippingAddress() {
        return $this->hasOne(CustomerShippingAddress::class);
    }

    public function customerItems() {
        return $this->hasMany(CustomerItem::class);
    }

    public function invoice() {
        return $this->belongsTo(Invoice::class);
    }
}
