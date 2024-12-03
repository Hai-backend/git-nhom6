<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Quên mật khẩu</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="index.php">Trang chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Quên mật khẩu</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Forgot Password Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Khôi phục mật khẩu</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col-lg-6 offset-lg-3 mb-5">
            <div class="contact-form bg-light p-4">
                <div id="success"></div>
                <!-- Form quên mật khẩu -->
                <form action="index.php?act=forgotPassword" method="post" id="forgot-password-form">
                    <div class="control-group mb-3">
                        <label for="forgot-username" class="form-label">Tên đăng nhập</label>
                        <input type="text" class="form-control" name="ten_dang_nhap" placeholder="Nhập tên đăng nhập của bạn" required>
                    </div>
                    <div class="control-group mb-3">
                        <label for="forgot-email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Nhập email của bạn" required>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary py-2 px-4" value="Gửi yêu cầu" name="forgotPassword">
                    </div>
                    <div class="mt-3">
                    <a href="index.php?act=signIn" class="text-primary toggle-link" onclick="toggleForms()">Đăng nhập tại đây</a>
                </div>
                </form>

                <?php
                if (isset($thongbao) && $thongbao != "") {
                    echo "<p class='mt-3 text-success'>$thongbao</p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Forgot Password End -->
