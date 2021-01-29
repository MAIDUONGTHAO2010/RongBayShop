<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\FileController;
use App\Models\ProductModel;
class ProductController extends Controller
{
    //
    public function create(Request $request)
    {
        $file = new FileController();
        $fileName= $file->setFile($request);
        $product = new ProductModel($request->all());
        $product->file = $fileName;
         $product ->save();
         return response()->json($product);
    }
    public function getAll(Request $request){
       $list = ProductModel::all();
        foreach ($list as $product) {
            $product['file'] =  url('images/' .$product['file']) ;
        }
        return $list;
    }
    public function update(Request $request)
    {
        if(isset($request->id)){
            $product = ProductModel::find($request->id);
            FileController::deleteFile($request,$product['file']);
            $product['file'] =   FileController::setFile($request);
            $product['name'] = $request->name;
            $product['category_product_id'] = $request->category_product_id;
            $product['description'] = $request->description;
            $product['price'] = $request->price;
            $product['code'] = $request->code;
            $product['id'] = $request->id;
            $product->update();
            return response()->json($product);
        }
    }
    public function getById(Request $request){
        if(isset($request->id)){
            $product = ProductModel::find($request->id);
            $product['file'] = url('images/' .$product['file']) ;
            return response()->json($product);
        }
    }
    public function delete(Request $request){
        if(isset($request->id)){
            $product = ProductModel::find($request->id);
            $product->delete();
            return response()->json();;
        }
    }
   

}
