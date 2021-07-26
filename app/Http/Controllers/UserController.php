<?php

namespace App\Http\Controllers;

use App\Models\Attributes;
use App\Models\AttributeVelue;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function index()
    {
    try{


        $cats = Categories::get();
            $products = Products::paginate(4);
//        $attr_values = AttributeVelue::select("attribute_velues.id", "attribute_velues.name", "attribute_velues.name as attribute_name"
//        )->join("attributes", "attributes.id", "=", "attribute_velues.attribute_id")->get();
        $attr_sizes = AttributeVelue::where('icon','size')->get();
        $attr_colors = AttributeVelue::where('icon','color')->get();
       // dd($attr_value);


            return view('dashboards.user.index', ['products' => $products,'cats'=>$cats,'attr_sizes'=>$attr_sizes,'attr_colors'=>$attr_colors]);
    } catch (\Throwable $e) {
        (report($e));
        return redirect()->back()->with('danger', __('messages.error'));
    }


    }
    public function categories($category_id){
        try{
        $cats = Categories::get();
        $products = Products::where(['category_id'=>$category_id])->get();
        $attr_sizes = AttributeVelue::where('icon','size')->get();
        $attr_colors = AttributeVelue::where('icon','color')->get();
        return view('dashboards.user.categories',['cats'=>$cats,'products'=>$products,'attr_sizes'=>$attr_sizes,'attr_colors'=>$attr_colors]);
        } catch (\Throwable $e) {
            (report($e));
            return redirect()->back()->with('danger', __('messages.error'));
        }
    }



    public function colorFilter($attribute_value_id){
        try{
        $attr_values =AttributeVelue::where('icon','color')->get();
        $cats = Categories::get();
        $products = Products::where(['attribute_value_id'=>$attribute_value_id])->get();
        $attr_sizes = AttributeVelue::where('icon','size')->get();
        $attr_colors = AttributeVelue::where('icon','color')->get();
        return view('dashboards.user.color',['attr_values'=>$attr_values,'products'=>$products,'attr_sizes'=>$attr_sizes,'attr_colors'=>$attr_colors,'cats'=>$cats]);
        } catch (\Throwable $e) {
            (report($e));
            return redirect()->back()->with('danger', __('messages.error'));
        }
    }

    public function sizeFilter($attribute_value_id){
        try{
        $attr_values =AttributeVelue::where('icon','size')->get();
        $cats = Categories::get();
        $products = Products::where(['attribute_value_id'=>$attribute_value_id])->get();
        $attr_sizes = AttributeVelue::where('icon','size')->get();
        $attr_colors = AttributeVelue::where('icon','color')->get();
        return view('dashboards.user.color',['attr_values'=>$attr_values,'products'=>$products,'attr_sizes'=>$attr_sizes,'attr_colors'=>$attr_colors,'cats'=>$cats]);
        } catch (\Throwable $e) {
            (report($e));
            return redirect()->back()->with('danger', __('messages.error'));
        }
    }
    public function main(){
        return view('user.dashboard');
    }
}
