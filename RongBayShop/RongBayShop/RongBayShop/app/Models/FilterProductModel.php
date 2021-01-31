<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
class FilterProductModel extends Model
{
    use Notifiable,
    SoftDeletes;
protected $table = 'filter_product';
protected $hidden = ['created_at'];
protected $casts = [
    'created_at' => 'date:Y-m-d H:i:s',
    'updated_at' => 'date:Y-m-d H:i:s',
    'deleted_at' => 'date:Y-m-d H:i:s',
];
protected $primaryKey = 'id';
protected $fillable = ['category_product_id', 'category_filter_id'];
}
