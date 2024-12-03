<?php
require_once 'pdo.php';

class Order
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = pdo_get_connection();
    }

    // Insert a new order
    public function taodonhang($total_price,$payment_method,$customer_name,$shipping_address,$customer_phone,$customer_email)
    {
        $sql = "INSERT INTO orders (total_price, payment_method, customer_name, shipping_address, customer_phone, customer_email) VALUES (:total_price, :payment_method, :customer_name, :shipping_address, :customer_phone, :customer_email)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(
            array(
                ':total_price' => $total_price,
                ':payment_method' => $payment_method,
                ':customer_name' => $customer_name,
                ':shipping_address' => $shipping_address,
                ':customer_phone' => $customer_phone,   
                ':customer_email' => $customer_email   
        ));
    }


}