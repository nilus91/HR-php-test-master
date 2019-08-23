<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;
use App\OrderProduct;
use App\Order;

class OrderController extends Controller {

    public static function showOrdersByTabs() {

        return view('orders', [
            'outdated_orders' => Order::getOutdatedOrders(),
            'current_orders' => Order::getCurrentOrders(),
            'new_orders' => Order::getNewOrders(),
            'completed_orders' => Order::getCompletedOrders(),
        ]);
    }

    public static function formEditOrderPage($order_id) {

        return view('order_edit', [
            'order' => Order::getSingleOrder($order_id),
            'all_partners' => Partner::getAllPartners(),
            'status_list' => Order::getStatusList()
        ]);
    }

    public static function update(Request $request, $order_id) {
        
        $input = $request->all();
        
//        dd($input);
        
        Order::where('id', $order_id)->update(['status' => $input['status'], 'client_email' => $input['client_email'], 'partner_id' => $input['partner_id']]);
        
//        dd($result);
        
        return redirect("orders/edit/$order_id/");
        
//        return "asdzxc <br>";
        
//            return view("orders",$order_id);
//            return view("order_edit",['order_id'=>$order_id]);
    }

}
