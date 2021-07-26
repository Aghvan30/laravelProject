<?php

namespace App\Http\Controllers;

use App\Models\Attributes;
use App\Models\AttributeVelue;
use App\Models\Categories;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        try {

            $cats = Categories::get();
            $attributData['data'] = Attributes::orderby("name", "asc")
                ->select('id', 'name')
                ->get();


            return view('dashboards.admin.index', ['cats' => $cats, 'attributData' => $attributData]);


        } catch
        (\Throwable $e) {
            (report($e));
            return redirect()->back()->with('danger', __('messages.error'));
        }

    }

    public function getattributeValue($attribute_valueid = 0)
    {

        try {


            $valueData['data'] = AttributeVelue::orderby("name", "asc")
                ->select('id', 'name')
                ->where('attribute_id', $attribute_valueid)
                ->get();

            return response()->json($valueData);

        } catch (\Throwable $e) {
            (report($e));
            return redirect()->back()->with('danger', __('messages.error'));
        }


    }
}
