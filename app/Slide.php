<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
  protected $fillable = ['link','image'];
  protected $table='slide';
}
