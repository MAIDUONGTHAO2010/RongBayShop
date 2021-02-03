<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FilterProductModel;
use App\Models\CategoryProduct;;
class FilterProductController extends Controller
{
    public function create(Request $request)
    {
       $listFilterType =$request->list;
        if(count($listFilterType)>0)
       {
        foreach ($listFilterType as $key) {
         $item = new FilterProductModel();
         $item->category_product_id =  $request->category_product_id;
         $item->category_filter_id =  $key;
         $item->save();
        }
    }
       return response()->json($listFilterType);
    }
    public function getListCategoryFilterByCategoryProduct(Request $request)
    {
        $list = FilterProductModel::where('category_product_id',$request->category_product_id)
                                 ->get();
        $listId = [];
        foreach ($list as $key) {
            array_push($listId,$key['id']);
        }
        $listResult = CategoryProduct::whereIn('id',$listId)
                        ->get();
        return response()->json($listResult);
    }
    public function update(Request $request)
    {
        $list = FilterProductModel::where('category_product_id',$request->category_product_id)
                                ->delete();

            return $this->create($request);

    }
    public function getAll(Request $request)
    {
        $list =FilterProductModel::get()->groupBy('category_product_id');

        if(count($list)>0){
            $listResult = [];
            foreach($list as $key => $value) {
                $list_category_filter_id = [];
                $category_product_id = null;
                foreach ($value as $item ) {
                    array_push( $list_category_filter_id,$item['category_filter_id']);
                    $category_product_id = $item['category_product_id'];
                }

                $val =  (array)[
                    'category_product_id' => $category_product_id,
                    'list' =>$list_category_filter_id
                ];
                array_push( $listResult,$val);

            }
             return $listResult;
        }

        return $list;
    }
}
