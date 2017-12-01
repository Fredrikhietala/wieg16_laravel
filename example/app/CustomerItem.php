<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CustomerItem
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customer[] $customer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\CustomerOrder[] $customerOrder
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $order_id
 * @property int|null $item_id
 * @property string|null $name
 * @property string|null $sku
 * @property int|null $qty
 * @property float|null $price
 * @property float|null $tax_amount
 * @property float|null $row_total
 * @property float|null $price_incl_tax
 * @property float|null $total_incl_tax
 * @property float|null $tax_percent
 * @property string|null $amount_package
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerItem whereAmountPackage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerItem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerItem wherePriceInclTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerItem whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerItem whereRowTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerItem whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerItem whereTaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerItem whereTaxPercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerItem whereTotalInclTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerItem whereUpdatedAt($value)
 */
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
