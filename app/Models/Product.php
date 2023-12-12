<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

  protected $fillable = [
      'name',
      'price',
      'brand',
      'stock',
      'product_image'
  ];

  /**
   * A product can be in many orders through the OrderProduct pivot table.
   */
  public function orders()
  {
      return $this->belongsToMany(Order::class, 'order_products')
          ->withPivot('discount_price');
  }
}