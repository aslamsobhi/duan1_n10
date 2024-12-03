<?php
function taodonhang($product_variant_id, $total_price, $payment_method, $customer_name, $shipping_address, $customer_phone, $customer_email) {
    try {
        // Kết nối PDO (giả sử bạn đã có hàm pdo_execute sẵn)
        $sql = "INSERT INTO orders (product_variant_id, total_price, payment_method, customer_name, shipping_address, customer_phone, customer_email) 
                VALUES (:product_variant_id, :total_price, :payment_method, :customer_name, :shipping_address, :customer_phone, :customer_email)";
        
        // Thực thi câu lệnh với các tham số
        pdo_execute($sql, [
            ':product_variant_id' => $product_variant_id,
            ':total_price' => $total_price,
            ':payment_method' => $payment_method,
            ':customer_name' => $customer_name,
            ':shipping_address' => $shipping_address,
            ':customer_phone' => $customer_phone,
            ':customer_email' => $customer_email
        ]);

        return true; // Thành công
    } catch (Exception $e) {
        // Xử lý lỗi (ghi log hoặc hiển thị thông báo)
        error_log("Lỗi tạo đơn hàng: " . $e->getMessage());
        return false; // Thất bại
    }
}
?>