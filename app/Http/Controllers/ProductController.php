<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Product_type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        $product_types = Product_type::where('status','1')->orderBy('name','asc')->get();
        return view('product.index',compact('products','product_types'));
    }

    public function store(Request $request){}
    public function update(){}
    public function destroy(){}
}
