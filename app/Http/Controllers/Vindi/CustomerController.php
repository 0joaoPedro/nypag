<?php

namespace App\Http\Controllers\Vindi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Vindi\Customer;
use App\User;

class CustomerController extends Controller
{
    /**
     * Demonstration of how to create a customer in Vindi API
     * 
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $customerService = new Customer();

        $user = User::find($request->input('user_id'));

        $paymentData = [
            'card_number' => $request->input('card_number'),
            'card_expiration' => $request->input('card_expiration'),
            'card_cvv' => $request->input('card_cvv'),
            'card_company' => $request->input('payment_company_code'),
        ];

        $customerId = $customerService->newCustomer($user, $paymentData);

        return response()->json([
            'message' => 'Customer created!',
            'customer_id' => $customerId,
        ], 201);
    }
}
