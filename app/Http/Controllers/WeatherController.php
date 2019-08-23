<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller {

    public $base_api_url = 'https://api.openweathermap.org/data/2.5/weather';
    public $api_token = '3a08e04ca24939d029d9930747628576';

    public function getWeatherForCity($city_name) {

        $json_response = $this->sendApiRequest("?q=$city_name&APPID=$this->api_token&units=metric");

        $array_data = json_decode($json_response, true);

        if (!$array_data)            
            return "От api не был получен корректный json ответ";        
        else
            return view('temperature', ['api_data' => $array_data, 'city_name' => $city_name]);
    }

    public function sendApiRequest($command) {

        $full_url = $this->base_api_url . $command;
        
//        echo $full_url . '<br>';
        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $full_url);

        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close($ch);

        return $server_output;
    }

}
