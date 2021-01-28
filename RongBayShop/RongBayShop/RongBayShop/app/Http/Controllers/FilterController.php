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
}
