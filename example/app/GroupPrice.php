<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\GroupPrice
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Customer[] $customer
 * @property-read \App\Group $group
 * @property-read \App\Product $product
 * @mixin \Eloquent
 * @property int $product_id
 * @property int $group_id
 * @property float $price
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupPrice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupPrice whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupPrice wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupPrice whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\GroupPrice whereUpdatedAt($value)
 */
class GroupPrice extends Model
{
    protected $primaryKey = 'entity_id';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'product_id',
        'group_id',
        'price'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function group() {
        return $this->belongsTo(Group::class);
    }

    public function customer() {
        return $this->belongsToMany(Customer::class);
    }
}
