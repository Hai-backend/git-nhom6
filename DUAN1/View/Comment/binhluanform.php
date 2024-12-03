<?php
session_start();
include "../../Commons/function.php";
include "../../Models/binhluan.php";
$dsbl = loadall_binh_luan($san_pham_id = 0);
$san_pham_id = $_REQUEST['san_pham_id'];
?>

<div class="col-md-6">
<h4 class="mb-4">Đánh Giá </h4>
    <?php
    foreach ($dsbl as $bl) {
        extract($bl);
        echo '
        <div class="media mb-4">
            <div class="media-body">
                <h6>' . $ten_nguoi_dung . '<small> - <i>' . $ngay_dang . '</i></small></h6>
                <div class="text-primary mb-2">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>' . $noi_dung . '</p>
            </div>
        </div>';
    }
    ?>
</div>

<div class="col-md-6">
    <h4 class="mb-4">Để lại đánh giá</h4>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label for="message">Đánh giá của bạn *</label>
            <textarea name="noi_dung" id="message" cols="30" rows="5" class="form-control"></textarea>
        </div>
        <div class="form-group mb-0">
            <input type="submit" name="guibinhluan" value="Để lại đánh giá của bạn" class="btn btn-primary px-3">
        </div>
    </form>
    <?php
    if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
        $noi_dung = $_POST['noi_dung'];
        $tai_khoan_id = $_SESSION['user']['id'];
        $ngay_dang	 = date('h:i:sa d/m/Y');
        insert_binh_luan($noi_dung, $tai_khoan_id, $ngay_dang);
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
    ?>
</div>