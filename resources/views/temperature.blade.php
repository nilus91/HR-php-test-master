@extends('main');

@section('content')

<div class="text-center">
    <label>Температура для города {{$city_name}} - {{$api_data['main']['temp']}} по цельсию</label>    
</div>

@endsection