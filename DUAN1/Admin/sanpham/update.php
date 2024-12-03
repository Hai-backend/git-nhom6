<?php
if (isset($sanpham)) {
    extract($sanpham);
}
$hinhpath = "../upload/" . $hinh_anh;
if (is_file($hinhpath)) {
    $hinh_anh = "<img src='" . $hinhpath . "' height='80'>";
} else {
    $hinh_anh = "no photo";
}
$sanpham = isset($_GET['id']) ? $_GET['id'] : null;
?>


<div class="container mt-5">
    <h1>Cập Nhật Sản Phẩm</h1>
    <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="danh_muc_id">Danh mục</label>
            <select class="form-control" name="danh_muc_id" required>
                <option value="" selected>Chọn danh mục</option>
                <?php
                foreach ($listdm as $danh_muc) {
                    extract($danh_muc);
                    if ($danh_muc_id == $id)
                        echo '<option value="' . $id . '"selected>' . $ten_danh_muc . '</option>';
                    else echo '<option value="' . $id . '">' . $ten_danh_muc . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="ten_san_pham">Tên sản phẩm</label>
            <input type="text" class="form-control" id="ten_san_pham" name="ten_san_pham" value="<?= $ten_san_pham ?>" required>
        </div>
        <div class="form-group">
            <label for="gia_san_pham">Giá sản phẩm</label>
            <input type="number" class="form-control" id="gia_san_pham" name="gia_san_pham" value="<?= $gia_san_pham ?>" required>
        </div>
        <div class="form-group">
            <label for="gia_khuyen_mai">Giá khuyến mãi</label>
            <input type="number" class="form-control" id="gia_khuyen_mai" name="gia_khuyen_mai" value="<?= $gia_khuyen_mai ?>">
        </div>
        <div class="form-group">
            <label for="thuong_hieu">Thương hiệu </label>
            <input type="text" class="form-control" id="thuong_hieu" name="thuong_hieu" value="<?= $thuong_hieu ?>" required>
        </div>
        <div class="form-group">
            <label for="kich_thuoc">Kích cỡ</label>
            <select class="form-control" id="kich_thuoc" name="kich_thuoc" required>
                <option value="<?= $kich_thuoc ?>" selected>Chọn kích cỡ</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
            </select>
        </div>
        <div class="form-group">
            <label for="mau_sac">Màu sắc</label>
            <select class="form-control" id="mau_sac" name="mau_sac" required>
                <option value="<?= $mau_sac ?>" selected>Chọn màu sắc</option>
                <option value="Đỏ">Đỏ</option>
                <option value="Xanh">Xanh</option>
                <option value="Vàng">Vàng</option>
                <option value="Đen">Đen</option>
                <option value="Trắng">Trắng</option>
            </select>
        </div>
        <div class="form-group">
            <label for="hinh_anh">Hình ảnh</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="hinh_anh" name="hinh_anh"><?= $hinh_anh ?>
                <label class="custom-file-label" for="hinh_anh">Chọn ảnh</label>
            </div>
        </div>
        <div class="form-group">
            <label for="mo_ta">Mô tả</label>
            <textarea class="form-control" id="mo_ta" name="mo_ta" rows="4"><?= $mo_ta ?></textarea>
        </div>


        <div class="form-group">
            <input type="hidden" name="id" value="<?= $sanpham ?>">
            <input class="btn btn-primary" type="submit" name="capnhat" value="CẬP NHẬT">
            <a href="index.php?act=listsp"><input class="btn btn-primary" type="button" value="DANH SÁCH"></a>
        </div>
        <?php
        if (isset($thongbao) && ($thongbao != "")) {
            echo "<div class='alert azlert-success mt-3'>$thongbao</div>";
        }
        ?>
    </form>
</div>