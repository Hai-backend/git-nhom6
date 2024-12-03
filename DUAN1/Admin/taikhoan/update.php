<?php
if (isset($customer)) {
    extract($customer);
    $customer = isset($_GET['id']) ? $_GET['id'] : null;
}

?>
<div class="container mt-5">
    <h1>Cập Nhật Thông Tin Khách Hàng</h1>
    <form action="index.php?act=updatekh" method="POST">
        <div class="form-group">
            <label for="ten_dang_nhap">Tên Đăng Nhập</label>
            <input type="text" class="form-control" id="ten_dang_nhap" name="ten_dang_nhap" value="<?= $ten_dang_nhap ?>" required />
        </div>
        <div class="form-group">
            <label for="mat_khau">Mật Khẩu</label>
            <input type="password" class="form-control" id="mat_khau" name="mat_khau" value="<?= $mat_khau ?>" required />
        </div>
        <div class="form-group">
            <label for="ho_ten">Họ Tên</label>
            <input type="text" class="form-control" id="ho_ten" name="ho_ten" value="<?= $ho_ten ?>" required />
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>" required />
        </div>
        <div class="form-group">
            <label for="so_dienthoai">Số Điện Thoại</label>
            <input type="text" class="form-control" id="so_dienthoai" name="so_dienthoai" value="<?= $so_dienthoai ?>" required />
        </div>
        <div class="form-group">
            <label for="dia_chi">Địa Chỉ</label>
            <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="<?= $dia_chi ?>" required />
        </div>
        <div class="form-group">
            <select class="form-control" id="vai_tro" name="vai_tro" required>
                <option value="client" <?= $vai_tro == 'client' ? 'selected' : '' ?>>Khách hàng</option>
                <option value="admin" <?= $vai_tro == 'admin' ? 'selected' : '' ?>>Quản trị viên</option>
            </select>
        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="<?= $customer ?>">
            <input class="btn btn-primary" type="submit" name="capnhat" value="CẬP NHẬT">
            <a href="index.php?act=listkh"><input class="btn btn-primary" type="button" value="DANH SÁCH"></a>
        </div>
        <?php
        if (isset($thongbao) && ($thongbao != "")) {
            echo "<div class='alert azlert-success mt-3'>$thongbao</div>";
        }
        ?>
    </form>
</div>