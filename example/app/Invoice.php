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

    static public function recalculate() {
        $invoiceId = Invoice::get();
        $orders = CustomerOrder::where('invoice_id', '=', $invoiceId)->get();
        //$orders->load('orders');
        //$orders = $this->orders;
        $total = collect([$orders->subtotal, $orders->tax_amount, $orders->shipping_amount, $orders->shipping_tax_amount])->sum();
        //$piped = $total->pipe(function ($total) {
        return $total;
        //});

    }

    static public function dueDate() {
        $date = new DateTime(now());
        $date->modify('+30 day');
        $due_date = $date->format('Y-m-d');
        return $due_date;
    }

    static public function getSerialNumber() {
        $serialNumberId = DB::table('invoices')->max('serial_number_id');
        if ($serialNumberId == null) {
            $serialNumberId = 1;
        } elseif (isset($serialNumberId)) {
            return $serialNumberId;
        }
        else {
            $serialNumberId += 1;
        }
        return $serialNumberId;
    }
}
