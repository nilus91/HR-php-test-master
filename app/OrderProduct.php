<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    
    public static function getProductListForOrders($orders) {
        
        $temp = array();
        
        foreach ($orders as $order_num=>$order) {
            $products = OrderProduct::join('products','products.id','=','order_products.product_id')->where('order_id','=',$order['order_id'])->select('order_products.id as order_product_id','order_products.quantity as quantity','order_products.price as price','products.name as product_name')->get()->toArray();
            $temp[] = $products;
            $full_order_price = 0;
            if ($products)
            foreach ($products as $pr) {
                $full_order_price += (int)$pr['quantity'] * (int)$pr['price'];
            $orders[$order_num]['product_list'][] = $pr;            
            }
            $orders[$order_num]['full_price'] = $full_order_price;
        }
    
        return $orders;
        
    }
    
    
    
}
