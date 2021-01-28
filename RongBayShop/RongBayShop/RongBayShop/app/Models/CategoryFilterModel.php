<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class CategoryFilterModel extends Model
{
    use Notifiable,
    SoftDeletes;
    protected $table = 'category_filter';
    protected $hidden = ['deleted_at'];
    protected $casts = [
        'created_at' => 'date:Y-m-d H:i:s',
        'updated_at' => 'date:Y-m-d H:i:s',
        'deleted_at' => 'date:Y-m-d H:i:s',
    ];
    protected $primaryKey = 'id';
    protected $fillable = [ 'name','description'];
    public function filter(){
        return $this->hasMany('App\Models\FilterModel','category_filter_id','id');
    }
}
