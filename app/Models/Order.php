<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  use HasFactory;

  protected $fillable = [
      'order_date',
      'customer_id',
  ];

  /**
   * Define the relationship: a customer can have many orders.
   */
  public function customer()
  {
      return $this->belongsTo(Customer::class);
  }

  /**
   * Define the relationship: an order can have many products through the OrderProduct pivot table.
   */
  public function products()
  {
      return $this->belongsToMany(Product::class, 'order_products')
          ->withPivot('discount_price');
  }
}