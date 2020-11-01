<?php
/*
 * Author: Joshi Thomas
 * Date: 1/10/2020
    Remarks :-
    Api Used By Mobile API
*/

//require_once('/var/www/html/selfcheckout/vendor/autoload.php');
//
//use Aws\Sqs\SqsClient;

require_once('functions.php');
require_once('lib/Customer.php');
require_once('lib/Products.php');
require_once('lib/Db.php');

$uri   = new Uri();

$action   = $uri->get_action();
$action_r = preg_split('[=]', $action);
$action   = $action_r[0];

$scope = $_REQUEST['scopes'] != '' ? $_REQUEST['scopes'] : $_REQUEST['scope'];

$access_token = '';
$error_msg    = '';

if ($action == 'token') {

    if ($scope == 'users') {

        echo '{
              "status": 401,
              "type": "Error",
              "result": "Authentication failed"
            }' . "\n";
        exit;
    }

}

elseif ($action == 'orders') {

    if ($scope == 'create') {
        $headers = apache_request_headers();
        echo '{
                  "status": 200,
                  "type": "Order",
                  "result": "Order created"
                }' . "\n";
        exit;

    }
    elseif ($scope == 'listproducts') {
        $objProduct= new Products();
        echo $objProduct->getProducts();
    }
    elseif ($scope == 'registercustomer') {
        $objCustomer = new Customer();
        echo $objCustomer->registerCustomer();
    }


}

elseif ($action == 'sms' || $action == 'email') {
    // sending sms and email notifications
    //Database connection
    require_once('config.inc.php');

}
