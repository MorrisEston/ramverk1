<?php

namespace Anax\Controller;

class ipManLocation
{
    public function location($adress)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL =>'http://api.ipstack.com/' . $adress . '?access_key=d12a77c6f0f9ecdeee3e7d4600e27c21'
        ));
        $res = curl_exec($curl);
        curl_close($curl);

        return $res;
    }
}
