<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
  protected $fillable = ['order_id','product_id','quantily','unit_price','size'];
  protected $table='order_details';

  public function product()
  {
    return $this->belongsTo('App\Product');
  }

  public function order()
  {
    return $this->belongsTo('App\Order');
  }
}
