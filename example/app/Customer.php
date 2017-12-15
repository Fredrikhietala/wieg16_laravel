<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Customer
 *
 * @property-read \App\CustomerAddress $address
 * @property-read \App\Company $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\CustomerBillingAddress[] $customerBillingAddress
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\CustomerItem[] $customerItem
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\CustomerOrder[] $customerOrder
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\CustomerShippingAddress[] $customerShippingAddress
 * @property-read \App\Group $group
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\GroupPrice[] $groupPrice
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $email
 * @property string|null $firstname
 * @property string|null $lastname
 * @property int|null $gender
 * @property int|null $customer_activated
 * @property int|null $group_id
 * @property string|null $customer_company
 * @property int|null $default_billing
 * @property int|null $default_shipping
 * @property int|null $is_active
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $customer_invoice_email
 * @property string|null $customer_extra_text
 * @property int|null $customer_due_date_period
 * @property int|null $company_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereCustomerActivated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereCustomerCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereCustomerDueDatePeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereCustomerExtraText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereCustomerInvoiceEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereDefaultBilling($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereDefaultShipping($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Customer whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Invoice[] $invoice
 */
class Customer extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        "id",
        "email",
        "firstname",
        "lastname",
        "gender",
        "customer_activated",
        "group_id",
        "customer_company",
        "default_billing",
        "default_shipping",
        "is_active",
        "created_at",
        "updated_at",
        "customer_invoice_email",
        "customer_extra_text",
        "customer_due_date_period",
        "company_id"
    ];

    public function address() {
        return $this->hasOne(CustomerAddress::class);
    }

    public function company() {
        return $this->hasOne(Company::class);
    }

    public function customerOrder() {
        return $this->hasMany(CustomerOrder::class);
    }

    public function customerBillingAddress() {
        return $this->hasMany(CustomerBillingAddress::class);
    }

    public function customerShippingAddress() {
        return $this->hasMany(CustomerShippingAddress::class);
    }

    public function customerItem() {
        return $this->hasMany(CustomerItem::class);
    }

    public function group() {
        return $this->hasOne(Group::class);
    }

    public function groupPrice() {
        return $this->hasMany(GroupPrice::class);
    }

    public function invoice() {
        return $this->hasMany(Invoice::class);
    }
}
