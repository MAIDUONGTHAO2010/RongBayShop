<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FilterModel;
class FilterController extends Controller
{
    //
    public function create(Request $request )
    {
        # code...
        $filter = new FilterModel($request->all());
        $filter->save();
        return response()->json($filter);
    }
    public function getAll(Request $request )
    {
        # code...
        $filter =  FilterModel::all();
        return response()->json($filter);
    }
    public function update(Request $request )
    {
      if(isset($request->id)){
          $filter = FilterModel::find($request->id);
          $filter->update($request->all());
          return response()->json($filter);
      }
    }
    public function getById(Request $request )
    {
        # code...
        if(isset($request->id)){
            $filter = FilterModel::find($request->id);
            return response()->json($filter);
        }
    }
    public function delete(Request $request )
    {
        # code...
        if(isset($request->id)){
            $filter = FilterModel::find($request->id)->delete();
        }
    }
}
