<div class="container mt-5">
    <h2 class="text-center mb-4">Thêm Danh Mục Mới</h2>
    <form action="index.php?act=adddm" method="post">
        <div class="form-group">
            <label for="maloai">Mã danh mục</label>
            <input type="text" class="form-control" id="maloai" name="maloai" required>
        </div>
        <div class="form-group">
            <label for="ten_danh_muc">Tên danh mục</label>
            <input type="text" class="form-control" id="ten_danh_muc" name="ten_danh_muc" required>
        </div>
        <input class="btn btn-primary" type="submit" name="themmoi" value="THÊM MỚI">
        <input class="btn btn-primary" type="reset" value="NHẬP LẠI">
        <a href="index.php?act=listdm"><input class="btn btn-primary" type="button" value="DANH SÁCH"></a>
</div>
<?php
if (isset($thongbao) && ($thongbao != "")) {
    echo "<div class='alert alert-success mt-3'>$thongbao</div>";
}
?>