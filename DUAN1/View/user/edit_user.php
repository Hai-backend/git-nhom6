<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Cập nhật tài khoản</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Trang chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Cập nhật tài khoản</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Account Update Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Cập nhật thông tin tài khoản</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col-lg-6 offset-lg-3 mb-5">
            <div class="contact-form bg-light p-4">
                <?php 
                // Lấy dữ liệu từ session để hiển thị thông tin cũ
                if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
                    extract($_SESSION['user']);
                }
                ?>
                <!-- Form cập nhật tài khoản -->
                <form action="index.php?act=edit_user" method="post">
                    <div class="control-group mb-3">
                        <label for="ten_dang_nhap" class="form-label">Tên đăng nhập</label>
                        <input type="text" class="form-control" name="ten_dang_nhap" value="<?= isset($ten_dang_nhap) ? $ten_dang_nhap : '' ?>" required>
                    </div>
                    <div class="control-group mb-3">
                        <label for="mat_khau" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" name="mat_khau" value="<?= isset($mat_khau) ? $mat_khau : '' ?>" required>
                    </div>
                    <div class="control-group mb-3">
                        <label for="ho_ten" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" name="ho_ten" value="<?= isset($ho_ten) ? $ho_ten : '' ?>" required>
                    </div>
                    <div class="control-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?= isset($email) ? $email : '' ?>" required>
                    </div>
                    <div class="control-group mb-3">
                        <label for="dia_chi" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" name="dia_chi" value="<?= isset($dia_chi) ? $dia_chi : '' ?>" required>
                    </div>
                    <div class="control-group mb-3">
                        <label for="so_dienthoai" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" name="so_dienthoai" value="<?= isset($so_dienthoai) ? $so_dienthoai : '' ?>" required>
                    </div>
                    <!-- Truyền ID người dùng ẩn -->
                    <div>
                        <input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>">
                        <input type="submit" class="btn btn-primary py-2 px-4" value="Cập nhật" name="update">
                    </div>
                </form>

                <?php 
                // Hiển thị thông báo nếu có
                if (isset($thongbao) && $thongbao != "") {
                    echo "<p class='mt-3 text-success'>$thongbao</p>";
                }
                ?>

                <!-- Liên kết quay lại trang tài khoản -->
                <div class="mt-3">
                    <a href="index.php?act=signIn" class="text-primary">Quay lại trang tài khoản</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Account Update End -->

<script>
    // JavaScript để chuyển đổi giữa các form nếu cần (nếu có các form khác)
    function toggleForms() {
        const updateForm = document.getElementById('update-form');
        const otherForm = document.getElementById('other-form');
        
        if (updateForm.style.display === 'none') {
            updateForm.style.display = 'block';
            if (otherForm) otherForm.style.display = 'none';
        } else {
            updateForm.style.display = 'none';
            if (otherForm) otherForm.style.display = 'block';
        }
    }
</script>
