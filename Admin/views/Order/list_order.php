<div class="content-wrapper">
    <h2>Danh sách đơn hàng</h2>
    <a href="index.php?act=add_order" class="btn btn-primary mb-3">Thêm đơn hàng</a>
    <a href="index.php?act=archive_orders" class="btn btn-warning mb-3">Kho lưu trữ</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Khách hàng</th>
                <th>Ngày tạo</th>
                <th>Tổng tiền</th>
                <th>Trạng thái thanh toán</th>
                <th>Trạng thái vận chuyển</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 1; ?>
            <?php foreach ($orders as $order) : ?>
            <tr>
                <td><?= $index++ ?></td>
                <td><?= htmlspecialchars($order['customer_name']) ?></td>
                <td><?= $order['created_at'] ?></td>
                <td><?= number_format($order['total_price'], 0, ',', '.') ?> VND</td>
                <td>
                    <span class="badge bg-<?= $order['payment_status'] == 'paid' ? 'success' : 'danger' ?>">
                        <?= ucfirst($order['payment_status']) ?>
                    </span>
                </td>
                <td>
                    <span class="badge bg-<?= $order['shipping_status'] == 'delivered' ? 'success' : 'warning' ?>">
                        <?= ucfirst($order['shipping_status']) ?>
                    </span>
                </td>
                <td>
                    <a href="index.php?act=view_order_details&id=<?= $order['id'] ?>" class="btn btn-info">Chi tiết</a>
                    <a href="index.php?act=edit_order&id=<?= $order['id'] ?>" class="btn btn-warning">Sửa</a>
                    <a href="index.php?act=delete_order&id=<?= $order['id'] ?>" class="btn btn-danger"
                        onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này?')">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>