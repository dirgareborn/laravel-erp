<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as Image;

class ItemController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $items = Item::with('category')->index();
        return view("items.index", [ "items" => $items]);

    }

    public function create(){
        $categories = Category::all();
        return view("items.create", [ "categories" => $categories]);
    }

    public function store(ItemRequest $request){
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
            Storage::disk('public')->put('items/'.$filename, (string) $normal->encode());
            Storage::disk('public')->put('items/thumb/'.$filename, (string) $thumb->encode());
            $input['image'] = $filename;
         }
        $input['user_id'] = auth()->user()->id;
        Item::create($input);

        return redirect()->route("item.index");
    }

    public function edit($id){
        $item = Item::find($id);
        $categories = Category::all();
        return view("items.edit", [ "item" => $item, "categories" => $categories]);
    }

    public function update(ItemRequest $request, $id){
        $input = $request->all();
        $item = Item::find($id);
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
            Storage::disk('public')->put('items/'.$filename, (string) $normal->encode());
            Storage::disk('public')->put('items/thumb/'.$filename, (string) $thumb->encode());
            $input['image'] = $filename;
         }
        $item->update($input);
        return redirect()->route("product.index");
    }

    public function destroy($id){
        $item = Item::find($id);
        $item->delete();
        return redirect()->route("item.index");
    }
}
