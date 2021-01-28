<?php

namespace App\Http\Controllers;
use App\Models\FileModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Support\Str;
use Carbon\Carbon;
use File;
class FileController extends Controller
{
   public function saveFile(REQUEST $request)
   {
        $file = new FileModel();
        return $file::create($request->all());

   }
   public function getFile(REQUEST $request)
     {

    }
    public static function setFile(REQUEST $request)
    {
          $image  = $request->file('image');
          if(isset( $image))
          {
               $random = Str::random(20);
               $image  = $request->file('image');
               $filename  =$random.$image->getClientOriginalName();
               $image->move(public_path().'/images/',$filename);
               $image_resize = Image::make(public_path().'/images/'.$filename);
               $image_resize->save(public_path('images/' .$filename));
               // $link =  url('images/' .$filename);
               // File::delete(public_path('images/' .$filename)) ;
               // return substr($link,strpos( $link, 'images/')+7);
               return $filename;
          }
     }
     public static function  deleteFile(REQUEST $request,$filename)
     {
          if(isset($filename)){
               File::delete(public_path('images/' .$filename)) ;
          }
     }

}
