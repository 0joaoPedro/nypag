<?php

namespace App\Services\Vindi;

use Vindi\Exceptions\RequestException;
use Vindi\Subscription as VindiSubscription;

class Subscription extends VindiSubscription
{
    /**
     * Subscribe the user to the billing plan
     *
     * @param integer $customerId
     * @param integer $planId
     * @return void
     */
    public function newSubscription(int $customerId, int $planId)
    {
        try{
            return $this->create([
                'plan_id' => $planId,
                'customer_id' => $customerId,
                'payment_method_code' => 'credit_card',
            ]);
        }catch(RequestException $ex){
            return [
                'message' => 'Unable to subscribe customer!',
            ];
        }
    }
}