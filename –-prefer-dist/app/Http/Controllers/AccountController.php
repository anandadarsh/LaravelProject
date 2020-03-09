<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public $customer;

    public function __construct()
    { }

    /**
     * Save personal info.
     * 
     */

    public function savePersonalData(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customer',
            'phone' =>  'required|numeric|digits:10|unique:customer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "error" => 'validation_error',
                "message" => $validator->errors(),
            ], 422);
        }
        try {
            $userId  = Customer::addNewRecord($request->all());
            $this->assignDiscountToUser($userId);
            return response()->json(['status', 'registered successfully'], 200);
        } catch (Exception $e) {
            return response()->json([
                "error" => "could_not_register",
                "message" => "Unable to register user"
            ], 400);
        }
    }

    /**
     * Assign Discount to user.
     * 
     */

    public function assignDiscountToUser($userId)
    {
        try {
            $discount  = Discount::getRandomDiscount();
            if ($discount) {
                Customer::updateCustomerDiscount(['discount_id' => $discount->id], $userId);
                Discount::updateDiscountGivenNo(['times_of_given' => (int)$discount->times_of_given - 1], $discount->id);
            }
        } catch (Exception $e) {
            return response()->json([
                "error" => "Sorry Some Things went wrong",
                "message" => "Please Try with Another Email and phone number"
            ], 400);
        }
    }
}
