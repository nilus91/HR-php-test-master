@extends('main');

@section('content')

{{--dd($completed_orders)--}}

<ul class="nav nav-tabs" id="orders-by-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="outdated-orders-tab-button" data-toggle="tab" href="#outdated-orders-tab" role="tab" aria-controls="outdated-orders-tab" aria-selected="true">Просроченные</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" id="current-orders-tab-button" data-toggle="tab" href="#current-orders-tab" role="tab" aria-controls="current-orders-tab" aria-selected="false">Текущие</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" id="new-orders-tab-button" data-toggle="tab" href="#new-orders-tab" role="tab" aria-controls="new-orders-tab" aria-selected="false">Новые</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" id="completed-orders-tab-button" data-toggle="tab" href="#completed-orders-tab" role="tab" aria-controls="completed-orders-tab" aria-selected="false">Завершённые</a>
  </li>  
</ul>

<div class="tab-content" id="orders-by-tabs-content">
    
    <div class="tab-pane fade active" id="outdated-orders-tab" role="tabpanel" aria-labelledby="outdated-orders-tab">
          <table class="table table-bordered table-striped table-hover">
            <thead><tr><th>id заказа</th><th>название партнёра</th><th>стоимость заказа</th><th>состав заказа</th><th>статус заказа</th></tr></thead>
            <tbody>
                
                @php
                foreach($outdated_orders as $order_num=>$order) {
                echo '<tr><td><a href="'.URL::to('/').'/orders/edit/'.$order['order_id'].'">';
                            echo $order['order_id'].'</a></td>';
                echo '<td>'.$order['partner_name'].'</td>';
                echo '<td>'.$order['full_price'].'</td>';
                echo '<td>';
                     if (isset($order['product_list'])) {
                    foreach($order['product_list'] as $product_num=>$product)
                    echo $product['product_name'] . '<br>';
                    } else {
                    echo 'Список товаров пуст';
                    }
                    echo '</td>';
                    echo '<td>Просрочен</td>';
                echo '</td></tr>';
                }
                @endphp
                
            </tbody>
        </table>   
    </div>
    
    <div class="tab-pane fade" id="current-orders-tab" role="tabpanel" aria-labelledby="current-orders-tab">      
        <table class="table table-bordered table-striped table-hover">
            <thead><tr><th>id заказа</th><th>название партнёра</th><th>стоимость заказа</th><th>состав заказа</th><th>статус заказа</th></tr></thead>
            <tbody>
                
                @php
                foreach($current_orders as $order_num=>$order) {
                echo '<tr><td><a href="'.URL::to('/').'/orders/edit/'.$order['order_id'].'">';
                echo $order['order_id'].'</a></td>';
                echo '<td>'.$order['partner_name'].'</td>';
                echo '<td>'.$order['full_price'].'</td>';
                echo '<td>';
                     if (isset($order['product_list'])) {
                    foreach($order['product_list'] as $product_num=>$product)
                    echo $product['product_name'] . '<br>';
                    } else {
                    echo 'Список товаров пуст';
                    }
                    echo '</td>';
                    echo '<td>Текущий заказ</td>';
                echo '</td></tr>';
                }
                @endphp
                
            </tbody>
        </table>
    </div>
    
    <div class="tab-pane fade" id="new-orders-tab" role="tabpanel" aria-labelledby="new-orders-tab">
        <table class="table table-bordered table-striped table-hover">
            <thead><tr><th>id заказа</th><th>название партнёра</th><th>стоимость заказа</th><th>состав заказа</th><th>статус заказа</th></tr></thead>
            <tbody>
                
                @php
                foreach($new_orders as $order_num=>$order) {
                echo '<tr><td><a href="'.URL::to('/').'/orders/edit/'.$order['order_id'].'">';
                echo $order['order_id'].'</a></td>';
                echo '<td>'.$order['partner_name'].'</td>';
                echo '<td>'.$order['full_price'].'</td>';
                echo '<td>';
                     if (isset($order['product_list'])) {
                    foreach($order['product_list'] as $product_num=>$product)
                    echo $product['product_name'] . '<br>';
                    } else {
                    echo 'Список товаров пуст';
                    }
                    echo '</td>';
                    echo '<td>Текущий заказ</td>';
                echo '</td></tr>';
                }
                @endphp
                
            </tbody>
        </table>
                
    </div>
    
    <div class="tab-pane fade" id="completed-orders-tab" role="tabpanel" aria-labelledby="completed-orders-tab">
        <table class="table table-bordered table-striped table-hover">
            <thead><tr><th>id заказа</th><th>название партнёра</th><th>стоимость заказа</th><th>состав заказа</th><th>статус заказа</th></tr></thead>
            <tbody>
                
                @php
                foreach($completed_orders as $order_num=>$order) {
                echo '<tr><td><a href="'.URL::to('/').'/orders/edit/'.$order['order_id'].'">';
                echo $order['order_id'].'</a></td>';
                echo '<td>'.$order['partner_name'].'</td>';
                echo '<td>'.$order['full_price'].'</td>';
                echo '<td>';
                     if (isset($order['product_list'])) {
                    foreach($order['product_list'] as $product_num=>$product)
                    echo $product['product_name'] . '<br>';
                    } else {
                    echo 'Список товаров пуст';
                    }
                    echo '</td>';
                    echo '<td>Текущий заказ</td>';
                echo '</td></tr>';
                }
                @endphp
                
            </tbody>
        </table>
    </div>
    
</div>

@endsection