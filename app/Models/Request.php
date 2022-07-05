<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Request extends RModel
{
  protected $fillable = [
    'user_id',
    'status'
  ];
  public function order_items()
  {
    return $this->hasMany(OrderItem::class)->select(DB::raw('product_id,sum(value) as valores, count(1) as qtd'))->groupBy('product_id')->orderBy('product_id', 'desc');
  }
  public function order_product_items()
  {
    return $this->hasMany(OrderItem::class);
  }
  public static function consultaId($where)
  {
    $order = self::where($where)->first(['id']);
    return !empty($order) ? $order->id : null;
  }
}