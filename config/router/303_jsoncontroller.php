<?php
/**
 * Load the stylechooser as a controller class.
 */
return [
    "routes" => [
        [
            "info" => "Controller but with JSON",
            "mount" => "jsonvoorhees",
            "handler" => "\Anax\Controller\ControllerJSON",
        ],
    ]
];
