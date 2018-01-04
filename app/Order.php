<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = ['user_id','date_order' ,'total','name_receiver','phone','address_recevie','ship_date','note','status'];
  protected $table='orders';
  protected $dates = ['date_order'];


  public function orderdetails()
  {
    return $this->hasMany('App\OrderDetail');
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
