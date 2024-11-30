<?php
require_once 'pdo.php';
require_once 'Order.php';

// Kiểm tra có ID không
if (!isset($_GET['id'])) {
    echo "Không có ID đơn hàng.";
    exit;
}

$orderId = $_GET['id'];
$order = new Order();
$orderDetail = $order->getOrderById($orderId);

if (!$orderDetail) {
    echo "Không tìm thấy đơn hàng.";
    exit;
}
?>

<div class="content-wrapper">
    <h2>Chi tiết đơn hàng #<?= $orderDetail['id'] ?></h2>
    <p><strong>Khách hàng:</strong> <?= htmlspecialchars($orderDetail['customer_name']) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($orderDetail['customer_email']) ?></p>
    <p><strong>Số điện thoại:</strong> <?= htmlspecialchars($orderDetail['customer_phone']) ?></p>
    <p><strong>Địa chỉ giao hàng:</strong> <?= htmlspecialchars($orderDetail['shipping_address']) ?></p>
    <p><strong>Phương thức thanh toán:</strong> <?= htmlspecialchars($orderDetail['payment_method']) ?></p>
    <p><strong>Trạng thái thanh toán:</strong> <?= ucfirst($orderDetail['payment_status']) ?></p>
    <p><strong>Trạng thái vận chuyển:</strong> <?= ucfirst($orderDetail['shipping_status']) ?></p>
    <p><strong>Tổng tiền:</strong> <?= number_format($orderDetail['total_price'], 0, ',', '.') ?> VND</p>
    
    <h3>Danh sách các món trong đơn hàng</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $orderItems = $order->getOrderItems($orderId); // Giả sử có phương thức getOrderItems trong model
            foreach ($orderItems as $item) :
            ?>
                <tr>
                    <td><?= htmlspecialchars($item['product_name']) ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td><?= number_format($item['price'], 0, ',', '.') ?> VND</td>
                    <td><?= number_format($item['quantity'] * $item['price'], 0, ',', '.') ?> VND</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="index.php?act=list_order" class="btn btn-secondary">Quay lại</a>
</div>
