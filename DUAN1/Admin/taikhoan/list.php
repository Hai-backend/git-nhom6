<!-- taikhoan/list.php -->
<?php
// Trích xuất dữ liệu từ cơ sở dữ liệu
// $listCustomers là mảng chứa tất cả khách hàng
if (isset($thongbao)) {
    echo "<div class='alert alert-success'>$thongbao</div>";
}
?>
<h1>Danh Sách Khách Hàng</h1>
<form method="POST" action="index.php?act=delete_selected">
    <table class="table">
        <thead>
            <tr>
                <th><input type="checkbox" id="select_all" /></th>
                <th>ID</th>
                <th>Tên Đăng Nhập</th>
                <th>Họ Tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Vai Trò</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listCustomers as $customer): ?>
                <tr>
                    <td><input type="checkbox" name="selected_ids[]" value="<?= $customer['id'] ?>" /></td>
                    <td><?= $customer['id'] ?></td>
                    <td><?= $customer['ten_dang_nhap'] ?></td>
                    <td><?= $customer['ho_ten'] ?></td>
                    <td><?= $customer['email'] ?></td>
                    <td><?= $customer['so_dienthoai'] ?></td>
                    <td><?= $customer['dia_chi'] ?></td>
                    <td><?= $customer['vai_tro'] ?></td>
                    <td>
                        <a href="index.php?act=suakh&id=<?= $customer['id'] ?>" class="btn btn-warning">Sửa</a>
                        <a href="index.php?act=xoakh&id=<?= $customer['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa tài khoản này?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button type="submit" class="btn btn-danger">Xóa Các Khách Hàng Đã Chọn</button>
</form>
<script>
    // Đánh dấu tất cả checkbox khi chọn
    document.getElementById("select_all").onclick = function() {
        var checkboxes = document.getElementsByName("selected_ids[]");
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    };
</script>