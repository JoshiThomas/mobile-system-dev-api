<?php

/**
 * Created by PhpStorm.
 * User: Joshi Thomas
 * Date: 15/10/2020
 */
require_once ('Db.php');

class Customer
{

    /***
     * Register a new customer by email and phone number
     * @return string
     */
    public function registerCustomer()
    {
        $objDb = new Db();
        $conn  = $objDb->getDbConnection();

        $phone = $_REQUEST['phone'];
        $email = $_REQUEST['email'];

        $query     = " INSERT INTO customer
                        (name,
                        email,
                        phone_no
                        )
                        VALUES
                        ( '',
                          :email,
                          :phone 
                          ) ";
        $statement = $conn->prepare($query);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":phone", $phone);
        $statement->execute();

        // get the new customer ID;

        $result = array(
            "status" => 200,
            "type"   => "register-customer",
            "count"  => 1,
            "result" => array(
                'customerId' => $conn->lastInsertId(),
            ),
        );
        header("Content-Type: application/json");
        return json_encode($result, JSON_UNESCAPED_SLASHES);
    }

}