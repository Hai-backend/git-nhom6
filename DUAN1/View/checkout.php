<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Thanh toán</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Trang chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Thanh toán</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Checkout Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div class="mb-4">
                <h4 class="font-weight-semi-bold mb-4">Địa chỉ giao hàng</h4>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Họ và tên</label>
                        <input class="form-control" type="text" placeholder="Họ và tên">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>E-mail</label>
                        <input class="form-control" type="text" placeholder="example@email.com">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" type="text" placeholder="+84 345 6789">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" type="text" placeholder="Địa chỉ">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Tỉnh / thành</label>
                        <select class="custom-select">
                            <option selected>Chọn tỉnh/thành</option>
                            <option>Hà Nội</option>
                            <option>TP Hồ Chí Minh</option>
                            <option>Đà Nẵng</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Quận / huyện</label>
                        <select class="custom-select">
                            <option selected>Chọn quận/huyện</option>
                            <option>Cầu Giấy</option>
                            <option>Ba Đình</option>
                            <option>Đống Đa</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Phường / xã</label>
                        <select class="custom-select">
                            <option selected>Chọn phường/xã</option>
                            <option>Dịch Vọng</option>
                            <option>Mai Dịch</option>
                            <option>Trung Hòa</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Card for Order Summary -->
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Đơn hàng</h4>
                </div>
                <div class="card-body">
                    <?php
                    $total = 0; // Khởi tạo tổng tiền
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])):
                        foreach ($_SESSION['cart'] as $item):
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                    ?>
                            <!-- Tên sản phẩm -->
                            <div class="d-flex justify-content-between">
                                <p><b><?php echo htmlspecialchars($item['name']); ?></b></p>
                                <p><?php echo number_format($item['price'], 0, ',', '.'); ?> VNĐ</p>
                            </div>
                            <!-- Số lượng và Tổng tiền -->
                            <div class="d-flex justify-content-between">
                                <p>Số lượng: <?php echo $item['quantity']; ?></p>
                                <p><b>Tổng: <?php echo number_format($subtotal, 0, ',', '.'); ?> VNĐ</b></p>
                            </div>
                    <?php
                        endforeach;
                    else:
                        echo '<p class="text-center text-muted">Giỏ hàng của bạn đang trống.</p>';
                    endif;
                    ?>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Tổng tiền</h5>
                        <h5 class="font-weight-bold"><?php echo number_format($total, 0, ',', '.'); ?> VNĐ</h5>
                    </div>
                </div>
            </div>
            <!-- Payment Method -->
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Phương thức thanh toán</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="paypal">
                            <label class="custom-control-label" for="paypal">Thanh toán khi nhận hàng</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                            <label class="custom-control-label" for="directcheck">Thẻ tín dụng/Ghi nợ</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                            <label class="custom-control-label" for="banktransfer">Thẻ ATM nội địa</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <a href="index.php?act=Notification"><button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Đặt hàng</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Checkout End -->