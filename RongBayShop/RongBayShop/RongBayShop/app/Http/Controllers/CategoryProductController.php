<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
class CategoryProductController extends Controller
{
    public function create(Request $request)
    {
       return  CategoryProduct::create($request->all());
    }
    public function getAll(Request $request)
    {
       $listCategory =  CategoryProduct::with('product')->get();
       foreach ($listCategory as $key) {
          foreach ($key['product'] as $product) {
                $product['file'] = url('images/' .$product['file']) ;
          }
       }
       return $listCategory;
    }
    public function update(Request $request)
    {
       if(isset($request->id)){
            $category_cd = CategoryProduct::find($request->id);
            if(isset($category_cd)){
                $category_cd->update($request->all());
                return $request->all();
            }
       }
    }
    public function delete(Request $request)
    {
        if(isset($request->id)){
            $category_cd = CategoryProduct::find($request->id);
            if(isset($category_cd)){
                $category_cd->delete();
                return response()->json();;
            }
        }
    }
    public function getById(Request $request)
    {
        if(isset($request->id)){
            $category_cd = CategoryProduct::with('product')->find($request->id);
            if(isset($category_cd)){
                if(count($category_cd['product'])>0)
             { foreach ($category_cd['product'] as $key) {
                $key['file'] = url('images/' .$key['file']) ;
              }}
              return  response()->json($category_cd);;
            }
           
        }
    }
}
