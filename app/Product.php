<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $fillable = ['name_product','branch_id','description','unit_price','promotion_price','image','count','size'];
   protected $table='products';

   public function branch()
   {
     return $this->belongsTo('App\Branch');
   }

   public function orderdetail()
   {
     return $this->hasMany('App\OrderDetail');
   }
}
