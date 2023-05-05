<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    function store(array $data)
    {
        try {
            $productModel = Product::create($data);
            if ($productModel) {
                return ['status' => true, 'message' => 'Product Added', 'code' => 200, 'category' => $productModel];
            }
            throw new \Exception("Category not added", 1);
        } catch (\Throwable $th) {
            return ['status' => false, 'message' => 'Something went wrong! Please try again.', 'error' => $th->getMessage(), 'code' => 400];
        }
    }
}
