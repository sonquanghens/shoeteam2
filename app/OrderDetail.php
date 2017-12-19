<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
  protected $fillable = ['bill_id','product_id' ,'name','phone','address_recevie','ship_date','quantily','unit_price','note'];
  protected $table='order_details';

  public function products()
  {
    return $this->belongsTo('App\Product');
  }

  public function orders()
  {
    return $this->belongsTo('App\Order');
  }
}
