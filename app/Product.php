<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Utilities;
use App\Uti_Pro;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable = ['id', 'homestay_id', 'room_type_id', 'name', 'prices', 'area','discount', 'avatar', 'description', 'status'];

    public function roomType(){
        return $this->belongsTo('App\RoomType', 'room_type_id','id');
    }
    public function homestay(){
        return $this->belongsTo('App\Homestay', 'homestay_id','id');
    }
    public function utilities(){
        return $this->belongsToMany('App\Utilities', 'uti_pro','product_id','utilities_id');
    }
    public function order(){
        return $this->hasMany('App\Order','product_id','id');
    }
    public function image(){
        return $this->hasMany('App\ImageProduct','product_id','id');
    }
}
