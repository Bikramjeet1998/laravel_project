<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = product::get();
        return view('pages.products.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = new ProductService();
        $res =  $result->Store($request);
        if ($res['status']) {
            session()->flash('success',  $res['message']);
        } else {
            session()->flash('error',  $res['message']);
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("hello");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $cat = Product::find($id);
        $delete = $cat->delete();
        if ($delete) {
            $delete = ['status' => true, 'message' => 'Category deleted', 'code' => 200, 'category' => $cat];
            session()->flash('success',  $delete['message']);
        } else {
            $delete = ['status' => false, 'message' => 'unable to  delete', 'code' => 400, 'category' => $cat];
            session()->flash('error',  $delete['message']);
        }
        return  redirect(route('products.index'));
    }
}
