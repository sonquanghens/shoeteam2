<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = ['user_id','date_order' ,'total','payment','note'];
  protected $table='orders';

  public function orderdetail()
  {
    return $this->hasMany('App\OrderDetail');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
