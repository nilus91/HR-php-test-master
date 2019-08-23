<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderProduct;

class Order extends Model {

    public static function getOutdatedOrders() {

        $outdated = Order::join('partners', 'partners.id', '=', 'orders.partner_id')->where('status', '10')->select('orders.delivery_dt', 'orders.id as order_id', 'orders.status', 'partners.name as partner_name')->whereDate('delivery_dt', '<', \Carbon\Carbon::now())->orderBy('delivery_dt', 'desc')->get()->toArray();
        $outdated = OrderProduct::getProductListForOrders($outdated);

        return $outdated;
    }

    public static function getCurrentOrders() {
        
        $time_limit = new \DateTime();
        $time_limit->modify('-24 hours');
        $time_limit = $time_limit->format('Y-m-d H:i:s');
        
        $current = Order::join('partners', 'partners.id', '=', 'orders.partner_id')->where([['status', '10'], ['delivery_dt','>',$time_limit]])->select('orders.delivery_dt', 'orders.id as order_id', 'orders.status', 'partners.name as partner_name')->orderBy('order_id', 'desc')->get()->toArray();
        $current = OrderProduct::getProductListForOrders($current);

        return $current;
    }
    
    public static function getNewOrders() {
        
        $new_orders = Order::join('partners', 'partners.id', '=', 'orders.partner_id')->where('status', '0')->whereTime('delivery_dt','>',\Carbon\Carbon::now())->select('orders.delivery_dt', 'orders.id as order_id', 'orders.status', 'partners.name as partner_name')->orderBy('delivery_dt', 'asc')->take(50)->get()->toArray();
        $new_orders = OrderProduct::getProductListForOrders($new_orders);

        return $new_orders;
    }
    
    public static function getCompletedOrders() {
        
        $completed_orders = Order::join('partners', 'partners.id', '=', 'orders.partner_id')->where('status', '20')->whereDate('delivery_dt','=',\Carbon\Carbon::now()->toDateString())->select('orders.delivery_dt', 'orders.id as order_id', 'orders.status', 'partners.name as partner_name')->orderBy('delivery_dt', 'desc')->take(50)->get()->toArray();
        $completed_orders = OrderProduct::getProductListForOrders($completed_orders);

        return $completed_orders;
    }
   
    public static function getSingleOrder($order_id) {
        
        $order = Order::select('id as order_id','status','delivery_dt','client_email','partner_id')->where('orders.id','=',$order_id)->get()->toArray();
        $order = OrderProduct::getProductListForOrders($order);
        $order = current($order);
        
        return $order;
        
    }
    
    public static function getStatusList() {
        
        return [0=>'Новый',10=>'Подтверждён',20=>'Завершён'];
        
    }

    
}
