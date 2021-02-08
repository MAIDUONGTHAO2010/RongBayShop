<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class ProductModel extends Model
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
    protected $fillable = [ 'name','file','brand','description','price','code','category_product_id'];
    public function category_product(){
        return $this->hasOne('App\Models\CategoryProduct','id','category_product_id');
    }
}
