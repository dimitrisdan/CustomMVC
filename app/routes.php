<?php
$routes = [
    "" => [ "get" ,"HomeController", "index" ],
    "home" => [ "get" ,"HomeController", "index" ],
    "contact-us" =>[ "get", "ContactController", "index" ] ,
    "about-us" => [ "get", "AboutController", "index" ] ,
    "contact/create" =>[ "post", "ContactController", "create" ]
];

function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}

