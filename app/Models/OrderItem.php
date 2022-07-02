<?php

namespace App\Models;



class OrderItem extends RModel
{
  protected $fillable = [
    'request_id',
    'product_id',
    'value ',
    'status'
  ];
  public function product()
  {
    return $this->belongsTo(Product::class, 'product_id', 'id');
  }
}