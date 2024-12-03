<div class="container mt-5">
    <h2 class="text-center mb-4">Thêm Sản Phẩm Mới</h2>
    <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="danh_muc_id">Danh mục</label>
            <select class="form-control" name="danh_muc_id" required>
                <option value="" selected>Chọn danh mục</option>
                <?php
                foreach ($listdm as $danhmmuc) {
                    extract($danhmmuc);
                    echo '<option value="' . $id . '">' . $ten_danh_muc . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="ten_san_pham">Tên sản phẩm</label>
            <input type="text" class="form-control" id="ten_san_pham" name="ten_san_pham" required>
        </div>
        <div class="form-group">
            <label for="gia_san_pham">Giá sản phẩm</label>
            <input type="number" class="form-control" id="gia_san_pham" name="gia_san_pham" required>
        </div>
        <div class="form-group">
            <label for="thuong_hieu">Thương hiệu </label>
            <input type="text" class="form-control" id="thuong_hieu" name="thuong_hieu">
        </div>
        <div class="form-group">
            <label for="kich_thuoc">Kích cỡ</label>
            <select class="form-control" id="kich_thuoc" name="kich_thuoc" required>
                <option value="" selected>Chọn kích cỡ</option>
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
                <option value="" selected>Chọn màu sắc</option>
                <option value="Đỏ">Đỏ</option>
                <option value="Xanh">Xanh</option>
                <option value="Vàng">Vàng</option>
                <option value="Đen">Đen</option>
                <option value="Trắng">Trắng</option>
            </select>
        </div>
        <div class="form-group">
            <label for="gia_khuyen_mai">Giá khuyến mãi</label>
            <input type="number" class="form-control" id="gia_khuyen_mai" name="gia_khuyen_mai">
        </div>
        <div class="form-group">
            <label for="hinh_anh">Hình ảnh</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="hinh_anh" name="hinh_anh" accept="image/*" onchange="previewImage();">
                <label class="custom-file-label" for="hinh_anh">Chọn ảnh</label>
            </div>
            <div class="mt-3" id="imagePreviewContainer">
                <img id="imagePreview" src="" alt="Image Preview" style="display:none; max-width: 300px; max-height: 200px; object-fit: cover;">
            </div>
        </div>
        <div class="form-group">
            <label for="mo_ta">Mô tả</label>
            <textarea class="form-control" id="mo_ta" name="mo_ta" rows="4"></textarea>
        </div>
        <a href="index.php?act=listsp"><input class="btn btn-primary" type="button" value="DANH SÁCH"></a>
        <input class="btn btn-primary" type="submit" name="themmoi" value="THÊM MỚI">
        <?php
        if (isset($thongbao) && ($thongbao != "")) {
            echo "<div class='alert alert-success mt-3'>$thongbao</div>";
        }
        ?>
    </form>
</div>

<script>
    function previewImage() {
        var file = document.getElementById("hinh_anh").files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            var imagePreview = document.getElementById("imagePreview");
            imagePreview.src = e.target.result;
            imagePreview.style.display = "block";
        };
        reader.readAsDataURL(file);
    }
</script>