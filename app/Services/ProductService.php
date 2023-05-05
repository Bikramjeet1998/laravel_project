<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{

    function Store($request)
    {
        $fileName = $this->images($request);
        $request->request->add(['image' => $fileName]);
        $data = [
            'name' => $request->Product_name,
            'image' =>  $request->image,
            'price' => $request->Product_price,
            'Gst' => $request->GST,
            'description' => $request->Products_Discription
        ];
        return (new ProductRepository)->store($data);
    }

    function images($request)
    {
        if ($request->hasFile('Product_image')) {
            $file = $request->file('Product_image');
            $fileName = $file->getClientOriginalName();
            if ($file->move('uploads/products', $fileName)) {
                return $fileName;
            }
        }
        return null;
    }
}
