<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    function categoryStoreAndUpdate($request, $id = null)
    {
        // file upload
        if ($request->hasFile('category_image')) {
            $file = $request->file('category_image');
            $fileName = $file->getClientOriginalName();
            if ($file->move('uploads/categories', $fileName)) {
                $request->request->add(['image' => $fileName]);
            }
        }
        $data = [
            'name' => $request->category_name,
            'image' =>  $request->image,
            'status' => $request->category_status,
            'description' => $request->category_description
        ];
        return (new CategoryRepository)->store($data);
    }

    function update($request, $id)
    {
    }
}
