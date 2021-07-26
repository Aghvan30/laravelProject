<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct(ProductRequest $request){

        try{
        $request->validated();

        $product = new Products();
        $product->name = $request['product_name'];
        $product->category_id = $request['category'];
        $product->attribute_id = $request['attribute'];
        $product->attribute_value_id = $request['attribute_value'];
        $product->price = $request['price'];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('upload', $fileName);
            $product->images = $fileName;
        }
       $product->save();
        return redirect()->back()->with('success',__('messages.success'));


        } catch (\Throwable $e) {
            (report($e));
            return redirect()->back()->with('danger', __('messages.error'));
        }
    }
}
