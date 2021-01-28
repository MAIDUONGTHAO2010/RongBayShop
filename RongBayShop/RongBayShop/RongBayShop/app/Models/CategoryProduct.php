<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use Notifiable,
        SoftDeletes;
    protected $table = 'category_product';
    protected $hidden = ['created_at'];
    protected $casts = [
        'created_at' => 'date:Y-m-d H:i:s',
        'updated_at' => 'date:Y-m-d H:i:s',
        'deleted_at' => 'date:Y-m-d H:i:s',
    ];
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description'];
    public function product(){
        return $this->hasMany('App\Models\ProductModel','category_product_id','id');
    }
}
