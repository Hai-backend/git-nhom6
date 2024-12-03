<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Khởi tạo session nếu chưa bắt đầu
}
?>

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Đăng ký tài khoản</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Trang chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Đăng ký</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Sign Up Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Tạo tài khoản mới</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col-lg-6 offset-lg-3 mb-5">
            <div class="contact-form bg-light p-4">
                <div id="success"></div>
                <!-- Form đăng ký -->
                <form action="index.php?act=signUp" method="post" id="register-form">
                    <div class="control-group mb-3">
                        <label for="register-email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Nhập email của bạn"
                            value="<?= isset($email) ? $email : '' ?>" required>
                    </div>
                    <div class="control-group mb-3">
                        <label for="register-user" class="form-label">Tên đăng nhập</label>
                        <input type="text" class="form-control" name="user" placeholder="Nhập tên đăng nhập"
                            value="<?= isset($ten_dang_nhap) ? $ten_dang_nhap : '' ?>" required>
                    </div>
                    <div class="control-group mb-3">
                        <label for="register-password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" name="pass" placeholder="Nhập mật khẩu" required>
                    </div>
                    <div class="control-group mb-3">
                        <label for="register-confirm-password" class="form-label">Xác nhận mật khẩu</label>
                        <input type="password" class="form-control" name="confirm-password" placeholder="Xác nhận mật khẩu" required>
                    </div>
                    <div class="control-group mb-3">
                        <label for="ho_ten" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" name="ho_ten" placeholder="Nhập họ và tên"
                            value="<?= isset($ho_ten) ? $ho_ten : '' ?>" required>
                    </div>
                    <div class="control-group mb-3">
                        <label for="dia_chi" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" name="dia_chi" placeholder="Nhập địa chỉ"
                            value="<?= isset($dia_chi) ? $dia_chi : '' ?>" required>
                    </div>
                    <div class="control-group mb-3">
                        <label for="so_dienthoai" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" name="so_dienthoai" placeholder="Nhập số điện thoại"
                            value="<?= isset($so_dienthoai) ? $so_dienthoai : '' ?>" required>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary py-2 px-4" value="Đăng ký" name="signUp">
                    </div>
                </form>

                <?php
                if (isset($thongbao) && $thongbao != "") {
                    echo "<p class='mt-3 text-success'>$thongbao</p>";
                }
                ?>

                <!-- Liên kết tới đăng nhập -->
                <div class="mt-3">
                    <a href="index.php?act=signIn" class="text-primary toggle-link" onclick="toggleForms()">Đã có tài khoản? Đăng nhập tại đây</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sign Up End -->

<!-- Login Form Start (Hidden by default) -->

<script>
    function toggleForms() {
        const registerForm = document.getElementById('register-form');
        const loginForm = document.getElementById('login-form');
        const container1 = document.querySelector('.container1');

        if (registerForm.style.display === 'none') {
            registerForm.style.display = 'block';
            container1.style.display = 'none';
        } else {
            registerForm.style.display = 'none';
            container1.style.display = 'block';
        }
    }
</script>