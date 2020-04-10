<?php

namespace App\Services\Vindi;

use App\User;
use Vindi\Customer as VindiCustomer;
use Vindi\Exceptions\RequestException;
use Vindi\PaymentProfile;

class Customer extends VindiCustomer
{
    /**
     * Vindi API Customer
     * @var Vindi\Customer
     */
    protected $customer = null;

    public function __construct()
    {
        // $this->customer = new VindiCustomer();
        parent::__construct();
    }

    /**
     * Retrieves a single Vindi Customer based on the given id
     *
     * @param int $customerId
     * @return void
     */
    public function getCustomer(int $customerId)
    {
        try{
            return $this->get($customerId);
        }catch(RequestException $ex){
            return false;
        }
    }
    
    /**
     * Create a new Vindi Customer with given information
     *
     * @param User $user
     * @return integer
     */
    public function newCustomer(User $user, array $paymentData)
    {
        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'registry_code' => $user->cpf_cnpj,
            'code' => $user->id,
            'phones' => [
                [
                    'phone_type' => 'mobile',
                    'number' => preg_replace('/[^\d]/', '', $user->phone_number),
                ]
            ],
        ];

        try{
            $customer = $this->create($data);

            $user->has_vindi_account = 1;
            $user->vindi_id = $customer->id;

            $user->save();

            // The customer need a payment profile:

            $this->createPaymentProfile($user, $paymentData);

            return $customer->id;
        }catch(RequestException $ex){
            return $this->requestErrors();
        }
    }

    /**
     * Create payment profile for the given user:
     *
     * @param User $user
     * @param array $paymentData
     * @return void
     */
    public function createPaymentProfile(User $user, array $paymentData)
    {
        try{
            $profileData = [
                "payment_method_code" => "credit_card",
                "holder_name" => $user->name,
                "card_expiration" => str_replace('-', '/', $paymentData['card_expiration']),
                "card_number" => $paymentData['card_number'],
                "card_cvv" => $paymentData['card_cvv'],
                "payment_company_code" => $paymentData['card_company'],
                "customer_id" => $user->vindi_id,
            ];

            $paymentService = new PaymentProfile();

            $paymentService->create($profileData);

            return true;
        }catch(RequestException $ex){
            $lResp = $paymentService->getLastResponse();

            return [
                'status' => $lResp->getStatusCode(),
                'data' => $profileData
            ];
        }
    }

    private function requestErrors()
    {
        $lastResponse = $this->getLastResponse();

        return $lastResponse->getBody();
    }
}