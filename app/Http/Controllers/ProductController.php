<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as Image;

class ProductController extends Controller
{
    public function index(){

        $products = Product::index();
        return view("products.index", [ "products" => $products]);

    }

    public function create(){
        $categories = Category::all();
        return view("products.create", [ "categories" => $categories]);
    }

    public function store(ProductRequest $request){
        $input = $request->all();
        if($request->hasfile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = str_replace(' ','', time().'_'.$image->getClientOriginalName());
            $thumb = \Image::make($image)->resize(80, 50,
            function ($constraint) {
                $constraint->aspectRatio();
            })->encode($extension);
            $normal = \Image::make($image)->resize(800, 500,
            function ($constraint) {
                $constraint->aspectRatio();
            })->encode($extension);
            Storage::disk('public')->put('products/'.$filename, (string) $normal->encode());
            Storage::disk('public')->put('products/thumb/'.$filename, (string) $thumb->encode());
            $input['image'] = $filename;
         }
        $input['user_id'] = auth()->user()->id;
        Product::create($input);

        return redirect()->route("product.index");
    }
}
