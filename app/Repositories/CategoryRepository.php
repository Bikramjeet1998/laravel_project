<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    function store(array $data)
    {
        try {
            $categoryModel = Category::create($data);
            if ($categoryModel) {
                return ['status' => true, 'message' => 'Category Added', 'code' => 200, 'category' => $categoryModel];
            }
            throw new \Exception("Category not added", 1);
        } catch (\Throwable $th) {
            return ['status' => false, 'message' => 'Something went wrong! Please try again.', 'error' => $th->getMessage(), 'code' => 400];
        }
    }

    function update(array $data, $id)
    {
        $category = Category::find($id);
        $category->name = $data['name'];
        $category->status = $data['status'];
        $category->description = $data['description'];
        $category->image = $data['image'];
        if ($category->save()) {
            return ['status' => true, 'message' => 'Category updated', 'code' => 200, 'category' => $category];
        }
    }
}
