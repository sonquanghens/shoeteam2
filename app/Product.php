<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
   use SoftDeletes;
   protected $fillable = ['name_product','branch_id','description','unit_price','promotion_price','image','count','size'];
   protected $table='products';
   protected $dates = ['deleted_at'];

   public function branch()
   {
     return $this->belongsTo('App\Branch');
   }

   public function orderdetail()
   {
     return $this->hasMany('App\OrderDetail');
   }
}
