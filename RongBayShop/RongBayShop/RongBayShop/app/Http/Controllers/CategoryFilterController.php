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
}
