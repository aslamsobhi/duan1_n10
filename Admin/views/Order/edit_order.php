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
    <h2>Sửa đơn hàng #<?= $orderDetail['id'] ?></h2>

    <form action="index.php?act=update_order" method="post">
        <input type="hidden" name="order_id" value="<?= $orderDetail['id'] ?>">
        
        <div class="form-group">
            <label for="payment_status">Trạng thái thanh toán</label>
            <select name="payment_status" class="form-control" id="payment_status">
                <option value="paid" <?= $orderDetail['payment_status'] == 'paid' ? 'selected' : '' ?>>Đã thanh toán</option>
                <option value="unpaid" <?= $orderDetail['payment_status'] == 'unpaid' ? 'selected' : '' ?>>Chưa thanh toán</option>
            </select>
        </div>

        <div class="form-group">
            <label for="shipping_status">Trạng thái vận chuyển</label>
            <select name="shipping_status" class="form-control" id="shipping_status">
                <option value="delivered" <?= $orderDetail['shipping_status'] == 'delivered' ? 'selected' : '' ?>>Đã giao hàng</option>
                <option value="cancelled" <?= $orderDetail['shipping_status'] == 'cancelled' ? 'selected' : '' ?>>Đã hủy</option>
                <option value="shipping" <?= $orderDetail['shipping_status'] == 'shipping' ? 'selected' : '' ?>>Đang vận chuyển</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật đơn hàng</button>
    </form>

    <a href="index.php?act=list_order" class="btn btn-secondary">Quay lại</a>
</div>
