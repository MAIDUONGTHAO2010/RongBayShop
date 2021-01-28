<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryFilterModel extends Model
{
    use Notifiable,
    SoftDeletes;
    protected $table = 'product';
    protected $hidden = ['deleted_at'];
    protected $casts = [
        'created_at' => 'date:Y-m-d H:i:s',
        'updated_at' => 'date:Y-m-d H:i:s',
        'deleted_at' => 'date:Y-m-d H:i:s',
    ];
    protected $primaryKey = 'id';
    protected $fillable = [ 'name','fileId','description','price','code','category_product_id'];
    public function file(){
        return $this->hasOne('App\Models\FileModel','id','fileId');
    }
    public function category_product(){
        return $this->hasOne('App\Models\CategoryProduct','id','category_product_id');
}
}
