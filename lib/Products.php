<?php

/**
 * Created by PhpStorm.
 * User: Joshi Thomas
 * Date: 15/10/2020
 */
require_once ('Db.php');

class Products
{
    /**
     * Get the list of products
     * @return string
     */
    public function getProducts()
    {
        $objDb     = new Db();
        $conn      = $objDb->getDbConnection();
        $query     = "SELECT name_id AS productId, `name` AS productName, price, image_url AS productImage  
                      FROM products ORDER BY name ASC";
        $statement = $conn->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        //        echo '<pre>';
        //        print_r($result);
        $result = array(
            "status"   => 200,
            "order_id" => null,
            "type"     => "products",
            "count"    => count($result),
            "result"   => $result,
        );
        header("Content-Type: application/json");
        return json_encode($result, JSON_UNESCAPED_SLASHES);
        //echo(json_encode($result));

    }

}