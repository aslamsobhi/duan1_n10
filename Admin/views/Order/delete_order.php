<?php
require_once 'pdo.php';
require_once 'Order.php';

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Xóa đơn hàng
    $order->deleteOrder($orderId); // Giả sử có phương thức deleteOrder trong model
    $_SESSION['message'] = "Đơn hàng đã được xóa thành công.";
    header("Location: index.php?act=list_order");
    exit;
}
?>

<div class="content-wrapper">
    <h2>Xóa đơn hàng #<?= $orderDetail['id'] ?></h2>
    <p>Bạn có chắc muốn xóa đơn hàng này không? Việc này sẽ không thể hoàn tác.</p>
    <form action="" method="post">
        <button type="submit" class="btn btn-danger">Xóa</button>
        <a href="index.php?act=list_order" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
