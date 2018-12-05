<?php

namespace Anax\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * A controller for flat file markdown content.
 */
class Controller implements ContainerInjectableInterface
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
    public function indexAction() : object
    {
        // $title = "IpMan";
        $adress = $this->di->get("request")->getGet("ipcheck");
        $page = $this->di->get("page");
        $num = 2;
        $longlat = "";
        $defaultIP = $_SERVER["REMOTE_ADDR"] ?? '127.0.0.1';

        $res = "";
        if (filter_var($adress, FILTER_VALIDATE_IP)) {
            $res = ("$adress is a valid IP address");
            $num = 1;
            $location = new ipManLocation();
            $longlat = $location->location($adress);
            $longlat = json_decode($longlat);
        } else {
            $res = ("$adress is not a valid IP address");
            $num = 0;
        };

        $page->add("anax/controller/index", [
            "res" => $res,
            "adress" => $adress,
            "num" => $num,
            "location" => $longlat,
            "default" => $defaultIP,
        ]);

        return $page->render([
            // "title" => $title,
        ]);
    }
}
