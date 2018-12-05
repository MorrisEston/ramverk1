<?php

namespace Anax\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * A controller for flat file markdown content.
 */
class ControllerJSON implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;



    /**
     * This is the index method action, it handles:
     * ANY METHOD mountpoint
     * ANY METHOD mountpoint/
     * ANY METHOD mountpoint/index
     *
     * @return string
     */
    public function indexAction()
    {
        $json = [];
        // $title = "JSONvoorhees";
        $adress = $this->di->get("request")->getGet("ipcheck");
        // $page = $this->di->get("page");
        $location = "";
        $num = 2;


        $res = "";
        if (filter_var($adress, FILTER_VALIDATE_IP)) {
            $res = ("$adress is a valid IP address");
            $location = new ipManLocation();
            $longlat = $location->location($adress);
            $longlat = json_decode($longlat);
            $num = 1;
        } else {
            $res = ("$adress is not a valid IP address");
            $num = 0;
        };

        if ($num == 1) {
            $json = [
                "adress" => $adress,
                "res" => $res,
                "type" => $longlat->type,
                "country" => $longlat->country_name,
                "city" => $longlat->city,
                "longitude" => $longlat->longitude,
                "latitude" => $longlat->latitude,
            ];
        } else {
            $json = [
                "adress" => $adress,
                "res" => $res,
            ];
        }


        return [$json];
    }
}
