<?php

namespace App;

use DateTime;
use DB;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Invoice
 *
 * @property int $id
 * @property string|null $invoice_date
 * @property string|null $due_date
 * @property int|null $customer_id
 * @property float $subtotal
 * @property float $tax_amount
 * @property float $shipping_amount
 * @property float $shipping_tax_amount
 * @property float $grand_total_incl_tax
 * @property int $invoice_billed
 * @property int|null $serial_number
 * @property int|null $serial_number_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Customer|null $customer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\CustomerOrder[] $orders
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereGrandTotalInclTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereInvoiceBilled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereInvoiceDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereSerialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereSerialNumberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereShippingAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereShippingTaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereTaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
        'grand_total_incl_tax',
        'invoice_billed',
        'serial_number',
        'serial_number_id'
        ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function orders() {
        return $this->hasMany(CustomerOrder::class);
    }

    public function recalculate() {
        $invoiceId = $this->id;
        $orders = CustomerOrder::where('invoice_id', '=', $invoiceId)->get();
        $customerId = 0;
        $subtotal = 0;
        $tax_amount = 0;
        $shipping_amount = 0;
        $shipping_tax_amount = 0;
        foreach ($orders as $order) {
            $customerId = $order->customer_id;
            $subtotal += $order->subtotal;
            $tax_amount += $order->tax_amount;
            $shipping_amount += $order->shipping_amount;
            $shipping_tax_amount += $order->shipping_tax_amount;
        }
        $this->customer_id = $customerId;
        $this->subtotal = $subtotal;
        $this->tax_amount = $tax_amount;
        $this->shipping_amount = $shipping_amount;
        $this->shipping_tax_amount = $shipping_tax_amount;
        $this->grand_total_incl_tax = $subtotal + $tax_amount + $shipping_amount + $shipping_tax_amount;

        return $this;


    }

    static public function dueDate() {
        $date = new DateTime(now());
        $date->modify('+30 day');
        $due_date = $date->format('Y-m-d');
        return $due_date;
    }

    public function getSerialNumber() {
        $year = $this->year;
        $serialNumber = $this->serial_number;
        if (isset($this->serial_number)) {
            return $serialNumber;
        } else {
            $serialNumberId = Invoice::max('serial_number_id')->where('year', 'LIKE', (int)(date('y')));
            if ($serialNumberId == null || Invoice::first($year = (date('y')))) {
                $serialNumberId = 1;
            }
            else {
                $serialNumberId += 1;
            }
            $this->serial_number = $serialNumberId + (int)(date('y').'0000');
            $this->serial_number_id = $serialNumberId;
            return $this;
        }

    }
}
