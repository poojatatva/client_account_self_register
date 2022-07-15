<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Location;

class HomeController extends Controller
{
    
    public function index()
    {
        $ip = request()->ip();
       // $ip = '203.115.91.17';
        $locationInfo = Location::get($ip);
        $lat = $locationInfo->latitude;
        $lon = $locationInfo->longitude;
        $weatherMainInfo = array();
        $userInfo = array();
        /*$weatherData = Redis::get('weather');
        if(isset($weatherData)) {
            $weatherFullInfo = json_decode($weatherData,true);
            $weatherMainInfo = $weatherFullInfo['main'];
        }
        else
        {*/
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.openweathermap.org/data/2.5/weather?lat=".$lat."&lon=".$lon."&appid=ae78024783a2e94da5a7d37a00a883b0",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_ENCODING => "",
                CURLOPT_TIMEOUT => 30000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                ),
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                //Redis::set('weather', $response);
                $weatherFullInfo = json_decode($response,true);
                $weatherMainInfo = $weatherFullInfo['main'];
            }
        //}

        $user = array(
            'id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'created_at' => Auth::user()->created_at->format('Y-m-d h:i:s'),
            'updated_at' => Auth::user()->updated_at->format('Y-m-d h:i:s'),
        );
        $userInfo['user'] = $user;
        $userInfo['main'] = $weatherMainInfo;
        return view('home',compact('userInfo'));
    }
}
