<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CustomerAddress
 *
 * @property-read \App\Customer $customer
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $customer_id
 * @property int|null $customer_address_id
 * @property string|null $email
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $postcode
 * @property string|null $street
 * @property string|null $city
 * @property string|null $telephone
 * @property string|null $country_id
 * @property string|null $address_type
 * @property string|null $company
 * @property string|null $country
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerAddress whereAddressType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerAddress whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerAddress whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerAddress whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerAddress whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerAddress whereCustomerAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerAddress whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerAddress whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerAddress whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerAddress whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerAddress wherePostcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerAddress whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CustomerAddress whereTelephone($value)
 */
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
