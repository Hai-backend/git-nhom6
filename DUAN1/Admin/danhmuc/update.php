<?php
if (isset($dm)) {
    // Lấy thông tin danh mục hiện tại
    $id = $dm['id'];
    $ten_danh_muc = $dm['ten_danh_muc'];
}
?>
<div class="container mt-5">
    <h1>Cập Nhật Danh Mục</h1>
    <form method="POST" action="index.php?act=updatedm">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
            <label for="ten_danh_muc">Tên Danh Mục</label>
            <input type="text" class="form-control" id="ten_danh_muc" name="ten_danh_muc" value="<?php echo isset($ten_danh_muc) ? $ten_danh_muc : ''; ?>" required>
        </div>
        <input class="btn btn-primary" type="submit" name="capnhat" value="CẬP NHẬT">
        <a href="index.php?act=listdm"><input class="btn btn-secondary" type="button" value="DANH SÁCH"></a>
        <a href="index.php?act=listdm" class="btn btn-secondary">Quay lại</a>

        <?php
        // Hiển thị thông báo sau khi cập nhật thành công
        if (isset($thongbao) && ($thongbao != "")) {
            echo "<div class='alert alert-success mt-3'>$thongbao</div>";
        }
        ?>
    </form>
</div>