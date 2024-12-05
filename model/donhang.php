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
    public function taodonhang($total_price, $payment_method, $customer_name, $shipping_address, $customer_phone, $customer_email, $user_id, $status_id)
    {
        $sql = "INSERT INTO orders (total_price, payment_method, customer_name, shipping_address, customer_phone, customer_email, user_id, status_id) 
                VALUES (:total_price, :payment_method, :customer_name, :shipping_address, :customer_phone, :customer_email, :user_id, :status_id)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':total_price' => $total_price,
            ':payment_method' => $payment_method,
            ':customer_name' => $customer_name,
            ':shipping_address' => $shipping_address,
            ':customer_phone' => $customer_phone,
            ':customer_email' => $customer_email,
            ':user_id' => $user_id,
            ':status_id' => $status_id
        ]);
    }
    
    


}