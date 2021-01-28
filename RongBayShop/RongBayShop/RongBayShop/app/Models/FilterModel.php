<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class FilterModel extends Model
{
    use Notifiable,
    SoftDeletes;
    protected $table = 'filter';
    protected $hidden = ['deleted_at'];
    protected $casts = [
        'created_at' => 'date:Y-m-d H:i:s',
        'updated_at' => 'date:Y-m-d H:i:s',
        'deleted_at' => 'date:Y-m-d H:i:s',
    ];
    protected $primaryKey = 'id';
    protected $fillable = [ 'name','description','category_filter_id'];
    public function category_filter(){
        return $this->hasOne('App\Models\CategoryFilterModel','id','category_filter_id');
    }
}
