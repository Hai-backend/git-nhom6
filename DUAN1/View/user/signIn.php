<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Khởi tạo session nếu chưa bắt đầu
}
?>

<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Tài khoản</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Trang chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Tài khoản</p>
        </div>
    </div>
</div>

<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-6 offset-lg-3 mb-5">
            <div class="contact-form bg-light p-4">
                <?php if (isset($_SESSION['user'])) {
                    $username = $_SESSION['user']["ten_dang_nhap"];
                    $role = $_SESSION['user']["vai_tro"]; // Lấy vai trò người dùng
                ?>
                    <!-- Hiển thị khi đã đăng nhập -->
                    <h2 class="text-center">Xin chào, <?= $username ?></h2>
                    <ul class="list-unstyled mt-4">
                        <li><a href="index.php?act=forgotPassword" class="btn btn-link">Quên mật khẩu</a></li>
                        <li><a href="index.php?act=edit_user" class="btn btn-link">Cập nhật tài khoản</a></li>
                        <?php if ($role == 'admin') { ?>
                            <!-- Hiển thị liên kết đăng nhập admin chỉ khi vai trò là admin -->
                            <li><a href="Admin/index.php" class="btn btn-link">Đăng nhập admin</a></li>
                        <?php } ?>
                        <li><a href="index.php?act=logOut" class="btn btn-link text-danger">Thoát</a></li>
                    </ul>
                <?php } else { ?>
                    <!-- Hiển thị form đăng nhập -->
                    <form action="index.php?act=signIn" id="login-form" method="post">
                        <h2 class="text-center">Đăng Nhập</h2>
                        <div class="control-group mb-3">
                            <label for="login-username">Tên đăng nhập</label>
                            <input type="text" name="user" class="form-control" placeholder="Nhập tên đăng nhập" required>
                        </div>
                        <div class="control-group mb-3">
                            <label for="login-password">Mật khẩu</label>
                            <input type="password" name="pass" class="form-control" placeholder="Nhập mật khẩu" required>
                        </div>
                        <div class="text-center">
                            <input type="submit" value="Đăng Nhập" name="signIn" class="btn btn-primary py-2 px-4">
                        </div>
                        <div class="text-center mt-3">
                            <a href="index.php?act=signUp" class="text-primary toggle-link" onclick="toggleForms()">Chưa có tài khoản? Đăng ký</a>
                            <br>
                            <a href="index.php?act=forgotPassword" class="text-secondary">Quên mật khẩu?</a>
                        </div>
                    </form>
                    

                <?php } ?>
                <?php
                    if (isset($thongbao) && $thongbao != "") {
                        echo "<p class='mt-3 text-success'>$thongbao</p>";
                    }
                    ?>
            </div>
        </div>
    </div>
</div>



<script>
    function toggleForms() {
        const loginForm = document.getElementById('login-form');
        const registerForm = document.getElementById('register-form');
        if (loginForm.style.display === 'none') {
            loginForm.style.display = 'block';
            registerForm.style.display = 'none';
        } else {
            loginForm.style.display = 'none';
            registerForm.style.display = 'block';
        }
    }
</script>