<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Product
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\GroupPrice[] $groupPrice
 * @mixin \Eloquent
 * @property int $entity_id
 * @property int|null $entity_type_id
 * @property int|null $attribute_set_id
 * @property string|null $type_id
 * @property string|null $sku
 * @property int|null $has_options
 * @property int|null $required_options
 * @property int|null $status
 * @property string|null $name
 * @property string|null $amount_package
 * @property float|null $price
 * @property int|null $is_salable
 * @property int|null $is_in_stock
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereAmountPackage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereAttributeSetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereEntityTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereHasOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereIsInStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereIsSalable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereRequiredOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUpdatedAt($value)
 */
class Product extends Model
{
    protected $primaryKey = 'entity_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'entity_id',
        'entity_type_id',
        'attribute_set_id',
        'type_id',
        'sku',
        'has_options',
        'required_options',
        'status',
        'name',
        'amount_package',
        'price',
        'is_salable',
        'is_in_stock',
        'created_at',
        'updated_at'
    ];

    public function groupPrice() {
        return $this->hasMany(GroupPrice::class);
    }
}
