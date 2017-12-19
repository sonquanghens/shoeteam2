<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
   protected $fillable = ['name','description','image'];
   protected $table = 'branchs';

   public function products()
   {
     return $this->hasMany('App\Product');
   }
}
