<?php

namespace App\Http\Controllers\Vindi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

// Vindi package

use App\Services\Vindi\Customer;
use App\Services\Vindi\Plan;
use App\Services\Vindi\Product;
use App\Services\Vindi\Subscription;

class BillingController extends Controller
{
    /**
     * @var Request
     */
    private $request;

    /**
     * Create a new subscription on Vindi Payment API:
     * 
     * @todo The user id must be catched by the authentication system.
     *
     * @param Request $request
     * @return void
     */
    public function newSubscription(Request $request)
    {
        $this->request = $request;

        // Retrieve the user: (this will be on the authentication later):

        $user = User::find($request->input('user_id'));

        // Subscribe the user

        $subscription = new Subscription();

        $subscriptionDetails = $subscription->newSubscription(
            $user->vindi_id,
            $this->createPlan()
        );

        return response()->json([
            'status' => 'success',
            'subscription_details' => $subscriptionDetails
        ], 200);
    }

    /**
     * Create the product to make a subscription
     *
     * @return int
     */
    private function createProduct()
    {
        $product = new Product();

        return $product->createProduct(
            $this->request->input('product_name'), 
            $this->request->input('product_description'), 
            $this->request->input('product_price')
        );
    }

    /**
     * Create the plan to make a subscription
     *
     * @return int
     */
    private function createPlan()
    {
        $planService = new Plan();
        $planService->setProduct($this->createProduct());
        
        return $planService->createPlan(
            $this->request->input('plan_name'),
            $this->request->input('plan_description'),
            $this->request->input('plan_installments')
        );
    }
}
