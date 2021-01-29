<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryFilterModel;
class CategoryFilterController extends Controller
{
    //
    public function create(Request $request)
    {
        $category = new CategoryFilterModel($request->all());
        $category->save();
        return response()->json($category);
    }
    public function getAll(Request $request)
    {
        $listCategoryFilter = CategoryFilterModel::with('filter')->get();
        return response()->json($listCategoryFilter);
    }
    public function getById(Request $request)
    {
        if(isset($request->id)){
            $category_cd = CategoryFilterModel::find($request->id);
              return  response()->json($category_cd);;
        }
    }
    public function update(Request $request)
    {
       if(isset($request->id)){
            $category_cd = CategoryFilterModel::find($request->id);
            if(isset($category_cd)){
                $category_cd->update($request->all());
                return $request->all();
            }
       }
    }
    public function delete(Request $request)
    {
        if(isset($request->id)){
            $category_cd = CategoryFilterModel::find($request->id);
            if(isset($category_cd)){
                $category_cd->delete();
                return response()->json();;
            }
        }
    }
}
