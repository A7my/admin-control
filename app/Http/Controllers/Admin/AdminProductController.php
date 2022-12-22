<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Http\Controllers\Controller;

class AdminProductController extends Controller
{

    public function index()
    {
        $products = Product::get();
        return view('Admin.index' , compact('products'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $editedProduct = Product::findorfail($id);
        return view('Admin.editProduct' , compact('editedProduct'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findorfail($id);
        $product->Product_Name = $request->text1;
        $product->Product_Category = $request->text2;
        $product->Product_Price = $request->text3;
        $product->save();

        return redirect('admin/products');
    }

    public function destroy($id)
    {
        //
    }
}
