<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = ['user_id','date_order' ,'total','payment','note'];
  protected $table='orders';

  public function orderdetails()
  {
    return $this->hasMany('App\OrderDetail','id','order_id');
  }

  public function user()
  {
    return $this->belongsTo('App\User','user_id','id');
  }
}
