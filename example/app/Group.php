<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Group
 *
 * @property-read \App\Customer $customer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\GroupPrice[] $groupPrice
 * @mixin \Eloquent
 * @property int $customer_group_id
 * @property string|null $customer_group_code
 * @property int|null $tax_class_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereCustomerGroupCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereCustomerGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereTaxClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Group whereUpdatedAt($value)
 */
class Group extends Model
{
    protected $primaryKey = 'customer_group_id';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'customer_group_id',
        'customer_group_code',
        'tax_class_id'
    ];

    public function groupPrice() {
        return $this->hasMany(GroupPrice::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
