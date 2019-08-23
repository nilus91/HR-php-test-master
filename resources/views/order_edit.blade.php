@extends('main');

@section('content')

{{--dd($order)--}}

{{--dd($order)--}}

<div class="container">
    <div class="text-center">Редактирование заказа {{$order['order_id']}}</div>
        <div><a href="{{url('orders/')}}">Назад</a></div><br>
    <form method="post" action="/orders/edit/{{$order['order_id']}}/">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="order-email">Почта клиента</label>
            <input required type="email" name="client_email" class="form-control" id="client-email" value="{{$order['client_email']}}" placeholder="Введите почту">    
        </div>

        <div class="form-group">
            <label for="order-partner">Поставщик</label>
            <select class="form-control" name="partner_id" id="order-partner" placeholder="Поставщик">
                @php
                foreach ($all_partners as $partner) {
                echo ($partner['id']==$order['partner_id']) ? '<option selected value="'.$partner['id'].'">'.$partner['name'].'</option>' : '<option value="'.$partner['id'].'">'.$partner['name'].'</option>';
                }
                @endphp
            </select>
        </div>

        <div class="form-group" id="edit-order-product-list">
            <label for="order-product-list">Список товаров</label>
            <ul class="list-group ">
                @php
                if (isset($order['product_list'])) {
                foreach ($order['product_list'] as $product_num=>$product) {                
                echo '<li class="list-group-item d-flex justify-content-between align-items-center">'.$product['product_name'];
                    echo '<span class="badge badge-primary badge-pill">'.$product['quantity'].'</span></li>';
                }
                }
                else {
                echo "Список товаров пуст";
                }
                @endphp                
            </ul>            
        </div>

        <div class="form-group">
            <label for="order-status">Статус заказа</label>
            <select class="form-control" name="status" id="order-status" placeholder="Статус заказа">
                @php
                foreach ($status_list as $status_int=>$status_str) {
                echo ($status_int==$order['status']) ? '<option selected value="'.$status_int.'">'.$status_str.'</option>' : '<option value="'.$status_int.'">'.$status_str.'</option>';
                }
                @endphp
            </select>
        </div>

        <div class="form-group">
            <label for="order-full-price">Стоимость заказа - {{$order['full_price']}}</label>            
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <button type="submit" class="btn btn-primary">Сохранить</button>

    </form>
</div>  

@endsection