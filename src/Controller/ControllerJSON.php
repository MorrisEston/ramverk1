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


        $res = "";
        if (filter_var($adress, FILTER_VALIDATE_IP)) {
            $res = ("$adress is a valid IP address");
        } else {
            $res = ("$adress is not a valid IP address");
        };

        $json = [
            "adress" => $adress,
            "res" => $res,
        ];

        return [$json];
    }
}
