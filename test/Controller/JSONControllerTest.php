<?php

namespace Anax\Controller;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the FlatFileContentController.
 */
class JSONControllerTest extends TestCase
{

    // Create the di container.
    public $di;
    public $controller;



    /**
     * Prepare before each test.
     */
    public function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Setup the controller
        $this->controller = new ControllerJSON();
        $this->controller->setDI($this->di);
        //$this->controller->initialize();
    }



    /**
     * Test the route "index".
     */
    public function testIndexValid()
    {
        $_GET["ipcheck"] = "127.0.0.1";
        $res = $this->controller->indexAction()[0];
        $exp = "127.0.0.1 is a valid IP address";
        $this->assertContains($exp, $res["res"]);
    }

    public function testIndexInvalid()
    {
        $_GET["ipcheck"] = "hejje";
        $res = $this->controller->indexAction()[0];
        $exp = "hejje is not a valid IP address";
        $this->assertContains($exp, $res["res"]);
    }
}
