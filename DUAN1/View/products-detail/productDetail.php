<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $productDetail = getProductDetail($id);
} else {
    echo "ID không tồn tại trong URL.";
}
?>

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Cửa hàng chi tiết</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shop Detail</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <?php

                    // Hiển thị ảnh sản phẩm
                    // Nếu hình ảnh lưu trong thư mục "uploads"
                    echo '<img class="w-100 h-100" src="upload/'.htmlspecialchars($productDetail['hinh_anh']) . '" alt="Product Image">';

                    ?>
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 pb-5">
            <h3 class="font-weight-semi-bold"><?= htmlspecialchars($productDetail['ten_san_pham']) ?></h3>
            <div class="d-flex mb-3">
                <div class="text-primary mr-2">
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star"></small>
                    <small class="fas fa-star-half-alt"></small>
                    <small class="far fa-star"></small>
                </div>
                <small class="pt-1"><?= $productDetail['luot_xem'] ?> lượt xem</small>
            </div>
            <h3 class="font-weight-semi-bold mb-4"><?= number_format($productDetail['gia_san_pham'], 0, ',', '.') ?> VNĐ</h3>

            <!-- Form Add to Cart -->
            <form action="index.php?act=cart&action=add" method="post">
                <input type="hidden" name="product_id" value="<?= $productDetail['id'] ?>">
                <input type="hidden" name="product_name" value="<?= htmlspecialchars($productDetail['ten_san_pham']) ?>">
                <input type="hidden" name="product_price" value="<?= $productDetail['gia_san_pham'] ?>">

                <div class="row mb-3">
                    <div class="col-12">
                        <label for="product_brand">Thương hiệu:</label>
                        <div id="product_brand" class="border p-2" style="display: inline-block;">
                            <b><?= htmlspecialchars($productDetail['thuong_hieu']) ?></b>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        <label for="product_color">Màu sắc:</label>
                        <div id="product_color" class="border p-2" style="display: inline-block;">
                            <b><?= htmlspecialchars($productDetail['mau_sac']) ?></b>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        <label for="product_size">Kích thước:</label>
                        <div id="product_size" class="border p-2" style="display: inline-block;">
                            <b><?= htmlspecialchars($productDetail['kich_thuoc']) ?></b>
                        </div>
                    </div>

                    <div class="col-auto mt-2">
                        <label for="quantity">Số lượng:</label>
                        <div class="input-group mb-3" style="background-color: #D19C97;">
                            <button type="button" class="btn btn-outline-secondary" id="decrement" style="color: black; background-color: transparent; border-color: #D19C97;"
                                onmouseover="this.style.color='white'" onmouseout="this.style.color='black'">-</button>
                            <input type="text" id="quantity" name="quantity" value="1" class="form-control" readonly style="width: 50px;text-align: center;">
                            <button type="button" class="btn btn-outline-secondary" id="increment" style="color: black; background-color: transparent; border-color: #D19C97;"
                                onmouseover="this.style.color='white'" onmouseout="this.style.color='black'">+</button>
                        </div>
                    </div>

                </div>

                <div class="row pb-3 mt-3">
                    <div class="col d-grid">
                        <button type="submit" class="btn btn-success btn-lg" style="background-color: #D19C97; transition: background-color 0.3s, color 0.3s;"
                            onmouseover="this.style.backgroundColor='#D19C97'; this.style.color='white';"
                            onmouseout="this.style.backgroundColor='#D19C97'; this.style.color='black';">
                            <i class="fa fa-shopping-cart mr-1"></i> Thêm vào giỏ hàng
                        </button>
                    </div>
                </div>

            </form>





            <!-- Share on social media -->
            <div class="d-flex pt-2">
                <p class="text-dark font-weight-medium mb-0 mr-2">Chia sẻ trên:</p>
                <div class="d-inline-flex">
                    <a class="text-dark px-2" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="text-dark px-2" href=""><i class="fab fa-twitter"></i></a>
                    <a class="text-dark px-2" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="text-dark px-2" href=""><i class="fab fa-pinterest"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Description and Reviews -->
    <div class="row px-xl-5">
        <div class="col">
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Mô tả</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Đánh giá (0)</a>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-1">
                    <h4 class="mb-3">Mô tả sản phẩm</h4>
                    <p><b><?= htmlspecialchars($productDetail['ten_san_pham']) ?></b></p>
                    <p><?= htmlspecialchars($productDetail['mo_ta']) ?></p>
                </div>
                <div class="tab-pane fade" id="tab-pane-3">
                    <!-- comment -->
                    <div id="binhluan" class="row">
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                // Load bình luận theo sản phẩm
                                $("#binhluan").load("View/Comment/binhluanform.php", {
                                    san_pham_id: <?= isset($id) ? intval($id) : 0; ?>
                                });
                            });
                        </script>
                    </div>
                    <!-- comment -->

                </div>
            </div>
        </div>
    </div>
</div>
<hr width="92%">

<!-- Recommended Products Start -->
<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Sản phẩm được yêu thích</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        <?php
        foreach ($spn as $san_phamn) {
            $hinh_anh = $hinh_anh_path . $san_phamn['hinh_anh'];
            echo '<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                                <div class="card product-item border-0 mb-4">
                                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                        <img class="img-fluid w-100" src="' . $hinh_anh . '" alt="">
                                    </div>
                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                        <h6 class="text-truncate mb-3">' . $san_phamn['ten_san_pham'] . '</h6>
                                        <div class="d-flex justify-content-center">
                                            <h6>' . number_format($san_phamn['gia_san_pham'], 0, ',', '.') . ' VNĐ</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>';
        }
        ?>
    </div>
</div>
<!-- Add script to handle increment/decrement -->
<script>
    document.getElementById('increment').addEventListener('click', function() {
        var quantity = document.getElementById('quantity');
        quantity.value = parseInt(quantity.value) + 1;
    });

    document.getElementById('decrement').addEventListener('click', function() {
        var quantity = document.getElementById('quantity');
        if (parseInt(quantity.value) > 1) {
            quantity.value = parseInt(quantity.value) - 1;
        }
    });
</script>
<!-- Recommended Products End -->