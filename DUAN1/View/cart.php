<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

$total = 0;
?>

<h1>
    <center>Giỏ hàng</center>
</h1>
<?php if (empty($cart)): ?>
    <center>
        <h2>Giỏ hàng trống!</h2>
    </center>
    <center><a href="index.php"><button style="background-color: #D19C97;" class="btn btn-success">Tiếp tục mua sắm</button></a></center>
<?php else: ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>

                <th>Thành tiền</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cart as $item):
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
            ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['name'] ?? ''); ?></td>
                    <td>
                        <?php if (!empty($item['hinh_anh'])): ?>
                            <img src="upload/ <?php echo htmlspecialchars($item['hinh_anh']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" style="width: 100px; height: auto;">
                        <?php else: ?>
                            <p>Không có ảnh</p>
                        <?php endif; ?>
                    </td>
                    <td><?php echo number_format($item['price'], 0, ',', '.'); ?> VNĐ</td>
                    <td>
                        <form action="index.php?act=cart&action=update" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                            <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1">
                            <button type="submit" class="btn btn-primary btn-sm">Cập nhật</button>
                        </form>
                    </td>
                    <td><?php echo number_format($subtotal, 0, ',', '.'); ?> VNĐ</td>
                    <td>
                        <a href="index.php?act=cart&action=remove&product_id=<?php echo $item['id']; ?>" class="btn btn-danger btn-sm">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h3>Tổng cộng: <?php echo number_format($total, 0, ',', '.'); ?> VNĐ</h3>
    <a href="index.php?act=checkout" style="background-color: #D19C97;" class="btn btn-success btn-lg">Thanh toán</a>
<?php endif; ?>