<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttributeRequest;
use App\Http\Requests\AttributeValueRequest;
use App\Models\Attributes;
use App\Models\AttributeVelue;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
   public function index(){
       return view('dashboards.admin.attribute.add-attribute');
   }



   public function addValue(){
       try{
       $attrVal=Attributes::get();

       return view('dashboards.admin.attribute.add_attribute_value',['attrVal'=>$attrVal]);

       } catch (\Throwable $e) {
           (report($e));
           return redirect()->back()->with('danger', __('messages.error'));
       }
   }


    public function addAttribute(AttributeRequest $request){

       try{
       $request->validated();
       $attr = new Attributes();
       $attr->name = $request['attribute_name'];
       $attr->save();
       return redirect()->back()->with('success',__('messages.success'));;

       } catch (\Throwable $e) {
           (report($e));
           return redirect()->back()->with('danger', __('messages.error'));
       }
    }




    public function addAttributeValue(AttributeValueRequest $request){
//dd($request);
       try{
       $request->validated();
       $attVal = new AttributeVelue();
       $attVal->name = $request['attribute_value'];
       $attVal->attribute_id = $request['attribute'];
       $attVal->icon = $request['icon'];
       $attVal->save();
        return redirect()->back()->with('success',__('messages.success'));;

       } catch (\Throwable $e) {
           (report($e));
           return redirect()->back()->with('danger', __('messages.error'));
       }


    }

}
