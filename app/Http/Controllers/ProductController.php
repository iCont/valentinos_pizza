<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Product_type;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        $product_types = Product_type::where('status','1')->orderBy('name','asc')->get();
        return view('product.index',compact('products','product_types'));
    }

    public function store(Request $request){
        // dd($request);
        $request->validate([
            'image'=>'required|image|max:2048',
        ]);

        $images = $request->file('image')->store('public/images');
        $url=Storage::url($images); //esto nos devolvera la URL a partir de storage

        Product::create([
            'name'=>$request->name,
            'url'=>$url,
            'price'=>$request->price,
            'product_type_id'=>$request->product_type,
            'branch_id'=>1,
            'status'=>1,
        ]);
        return back()->with('success','ok');
    }
    public function update(){}
    public function destroy(){}
}
