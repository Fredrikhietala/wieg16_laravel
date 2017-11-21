<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerAddress;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomersController extends Controller
{
    public function showCustomers() {
        return response()->json(Customer::all());
        //return response()->json(Customer::with('address')->all());
    }

    public function showSingleCustomer($id) {

        $customer = Customer::with('address')->find($id);
        if (is_object($customer)) {
            return response()->json($customer);
        } else {
            return response()->json(["message" => "Customer not found"], 404);
        }
    }

    public function showAddress($id) {

        $address = CustomerAddress::select('street', 'postcode', 'city')->where('id', $id)->get();

        if (count($address) > 0) {
            return response()->json($address);
        } else {
            return response()->json(["message" => "Address not found"], 404);
        }
    }

    public function showCustomerCompany($company_id) {
        $by_company = Customer::where('company_id', $company_id)->get();
        //$by_company = Customer::find($company_id);
        if (is_object($by_company)) {
            return response()->json($by_company);
        } else {
            return response()->json(["message" => "Company not found"], 404);
        }
    }
}
