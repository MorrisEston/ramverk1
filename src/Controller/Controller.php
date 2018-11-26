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

        $res = "";
        if (filter_var($adress, FILTER_VALIDATE_IP)) {
            $res = ("$adress is a valid IP address");
            $num = 1;
        } else {
            $res = ("$adress is not a valid IP address");
            $num = 0;
        };

        $page->add("anax/controller/index", [
            "res" => $res,
            "adress" => $adress,
            "num" => $num,
        ]);

        return $page->render([
            // "title" => $title,
        ]);
    }
}
