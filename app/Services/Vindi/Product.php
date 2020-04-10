<?php

namespace App\Services\Vindi;

use Vindi\Exceptions\RequestException;
use Vindi\Product as VindiProduct;

class Product extends VindiProduct
{
    /**
     * Creates a Vindi product
     *
     * @param string $name
     * @param string $description
     * @param float $price
     * @param integer $code Product code on our own system
     * @return mixed
     */
    public function createProduct(string $name, string $description, float $price, int $code = null)
    {
        $productData = [
            'name' => $name,
            'description' => $description,
            'pricing_schema' => [
                'price' => $price,
                'schema_type' => 'flat',
            ],
            'status' => 'active',
        ];

        if(null !== $code){
            $productData['code'] = $code;
        }

        try{
            $product = $this->create($productData);

            return $product->id;
        }catch(RequestException $ex){
            return false;
        }
    }
}