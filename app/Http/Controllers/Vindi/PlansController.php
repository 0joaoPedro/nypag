<?php

namespace App\Http\Controllers\Vindi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Vindi\Plan;

class PlansController extends Controller
{   
    /**
     * Demonstration of how to create a plan in Vindi API
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $planService = new Plan();

        $planService->setProduct($request->input('product_id'));
        $plan = $planService->createPlan(
            $request->input('plan_name'),
            $request->input('product_description'),
            $request->input('installments')
        );
        
        return response()->json([
            'message' => 'Plan Created!',
            'plan_details' => $plan,
        ]);
    }
}
