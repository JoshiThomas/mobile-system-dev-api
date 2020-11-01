<?php

use Aws\Ses\SesClient;

class Cart
{

}

class Invoice
{

}

class Order
{



}

class Product
{

}

class User
{


}

class Auth
{

}

class Uri
{

    public function get_uri()
    {
        $uri_array = preg_split('[\/]', $_SERVER['REQUEST_URI']);
        $uri       = preg_replace('/\?\w+/i', '', $uri_array[1]);
        return $uri;
    }

    public function get_action()
    {
        $uri_array = preg_split('[\/]', $_SERVER['REQUEST_URI']);
        $uri       = preg_replace('/\?\w+/i', '', $uri_array[count($uri_array) - 1]);
        return $uri;
    }

    public function get_page()
    {
        $uri_array = preg_split('[\/]', $_SERVER['REQUEST_URI']);
        $uri       = preg_replace('/\?\w+/i', '', $uri_array[count($uri_array) - 1]);
        return $uri;
    }

}

