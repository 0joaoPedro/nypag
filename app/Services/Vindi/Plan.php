<?php

namespace App\Services\Vindi;

use Vindi\Exceptions\RequestException;
use Vindi\Plan as VindiPlan;

class Plan extends VindiPlan
{
    /**
     * Retrieve plan\plans
     *
     * @param integer $planId
     * @return void
     */
    public function getPlan(int $planId = null)
    {
        try{
            if(!is_null($planId)){
                return $this->plan->get($planId);
            }

            return $this->plan->all();
        }catch(RequestException $reqEx){
            return ['error' => 'Plan with id ' . $planId . ' not found!'];
        }
    }

    /**
     * Set the plan product
     *
     * @param integer $productId
     * @return void
     */
    public function setProduct(int $productId)
    {
        $this->productId = $productId;
    }

    /**
     * Create a new plan on Vindi API
     *
     * @param string $name
     * @param string $description
     * @param integer $paymentDate
     * @param integer $installments
     * @param integer $code Plan code on our own system
     * @return mixed
     */
    public function createPlan(string $name, string $description, int $installments, int $code = null)
    {
        $planData = [
            'name' => $name,
            'interval' => 'months',
            'interval_count' => $installments, 
            'billing_trigger_type' => 'beginning_of_period',
            'billing_trigger_day' => 1,
            'billing_cycles' => 1,
            'description' => $description,
            'installments' => $installments,
            'plan_items' => $this->getPlanItems(),
            'status' => 'active',
        ];

        if(null !== $code){
            $planData['code'] = $code;
        }

        try{
            $plan = $this->create($planData);

            return $plan->id;
        }catch(RequestException $ex){
            return false;
        }
    }

    /**
     * Retrieve plan items
     *
     * @return void
     */
    private function getPlanItems()
    {
        return [
            [
                'product_id' => $this->productId,
                'cycles' => null,
            ]
        ];
    }
}