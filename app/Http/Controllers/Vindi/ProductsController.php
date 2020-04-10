<?php

namespace App\Http\Controllers\Vindi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Vindi\Product;

class ProductsController extends Controller
{
    /**
     * Demonstration of how to create a product in Vindi API
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $product = new Product();

        $prId = $product->createProduct(
            $request->input('product_name'), 
            $request->input('product_description'), 
            $request->input('product_price')
        );

        return response()->json([
            'message' => 'Product created!',
            'product_id' => $prId
        ], 201);
    }
}
