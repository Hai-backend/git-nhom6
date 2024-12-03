<?php
session_start();
ob_start();
include "Commons/function.php";
include "Models/danhmuc.php";
include "Models/sanpham.php";
include "Models/productDetail.php";
include "Models/taikhoan.php";
include "Models/cart.php";
include "../global.php";

$spnew = loadall_sanpham_home();
$spn = loadall_san_pham_noi();
$ds_danh_muc = loadall_danh_muc();
include_once "View/header.php";

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'shopsp':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }

            if (isset($_GET['danh_muc_id']) && ($_GET['danh_muc_id'] > 0)) {
                $danh_muc_id = $_GET['danh_muc_id'];
            } else {
                $danh_muc_id = 0;
            }
            $dssp = loadall_san_pham($kyw, $danh_muc_id);
            $tendm = loadone_tendm($danh_muc_id);
            include "view/shopsp.php";

            break;

        case 'shop':

            include "View/shop.php";
            break;
            // case 'detail':
            //     if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
            //         $id = $_GET['idsp'];
            //         $onesp = loadone_san_pham($id);
            //         include "view/detail.php";
            //     } else {
            //         include "view/home.php";
            //     }
            //     break;
        case 'cart':
            // Xử lý xóa sản phẩm khỏi giỏ hàng
            if (isset($_GET['action']) && $_GET['action'] == 'remove') {
                $product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;

                if ($product_id !== null && isset($_SESSION['cart'][$product_id])) {
                    unset($_SESSION['cart'][$product_id]); // Xóa sản phẩm
                }

                // Nếu giỏ hàng trống, xóa session giỏ hàng
                if (empty($_SESSION['cart'])) {
                    unset($_SESSION['cart']);
                }

                // Chuyển hướng lại trang giỏ hàng để làm mới dữ liệu
                header('Location: index.php?act=cart');
                exit;
            }

            include "View/cart.php";
            break;
        case 'productDetail':
            include "View/products-detail/productDetail.php";
            break;
        case 'checkout':
            include "View/checkout.php";
            break;
        case 'contact':
            include "View/contact.php";
            break;
        case 'signUp':
            if (isset($_POST['signUp']) && ($_POST['signUp'])) {
                $ten_dang_nhap = $_POST['user']; // Tên đăng nhập
                $mat_khau = $_POST['pass']; // Mật khẩu
                $confirm_pass = $_POST['confirm-password']; // Xác nhận mật khẩu
                $ho_ten = $_POST['ho_ten']; // Họ và tên
                $email = $_POST['email']; // Email
                $so_dienthoai = $_POST['so_dienthoai']; // Số điện thoại
                $dia_chi = $_POST['dia_chi']; // Địa chỉ

                // Kiểm tra mật khẩu và xác nhận mật khẩu có khớp không
                if ($mat_khau === $confirm_pass) {
                    // Thêm tài khoản mới vào cơ sở dữ liệu
                    $vai_tro = 'client'; // Mặc định là 'client' cho tất cả người dùng
                    insert_taikhoan($ten_dang_nhap, $mat_khau, $ho_ten, $email, $so_dienthoai, $dia_chi, $vai_tro);

                    $thongbao = "Đã đăng ký thành công. Vui lòng đăng nhập để tiếp tục!";
                } else {
                    $thongbao = "Mật khẩu và xác nhận mật khẩu không khớp!";
                }
            }
            include "View/user/signUp.php";
            break;

        case 'signIn':
            if (isset($_POST['signIn']) && ($_POST['signIn'])) {
                $ten_dang_nhap = $_POST['user']; // Tên đăng nhập
                $mat_khau = $_POST['pass']; // Mật khẩu

                // Kiểm tra thông tin đăng nhập
                $checkuser = checkuser($ten_dang_nhap, $mat_khau);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser; // Lưu thông tin người dùng vào session
                    $thongbao = "Đăng nhập thành công.";
                } else {
                    $thongbao = "Tên đăng nhập hoặc mật khẩu không đúng.";
                }
            }
            include "View/user/signIn.php";
            break;

        case 'edit_user':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $id = $_POST['id']; // ID người dùng
                $ten_dang_nhap = $_POST['ten_dang_nhap']; // Tên đăng nhập
                $mat_khau = $_POST['mat_khau']; // Mật khẩu
                $ho_ten = $_POST['ho_ten']; // Họ và tên
                $email = $_POST['email']; // Email
                $dia_chi = $_POST['dia_chi']; // Địa chỉ
                $so_dienthoai = $_POST['so_dienthoai']; // Số điện thoại

                // Gọi hàm cập nhật thông tin trong cơ sở dữ liệu
                $vai_tro = 'client';
                update_user($id, $ten_dang_nhap, $mat_khau, $ho_ten, $email, $dia_chi, $so_dienthoai, $vai_tro);

                // Cập nhật lại thông tin trong session để hiển thị dữ liệu mới
                $_SESSION['user'] = checkuser_by_id($id);

                // Hiển thị thông báo thành công
                $thongbao = "Thông tin tài khoản đã được cập nhật thành công.";
            }
            include "View/user/edit_user.php";
            break;
        case 'forgotPassword':
            if (isset($_POST['forgotPassword']) && ($_POST['forgotPassword'])) {
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $email = $_POST['email'];

                // Kiểm tra tên đăng nhập và email có khớp không
                $userInfo = checkuser_by_email($ten_dang_nhap, $email);  // Hàm checkuser_by_email tìm người dùng bằng username và email

                if ($userInfo) {
                    // Nếu tìm thấy, trả về mật khẩu
                    $thongbao = "Mật khẩu của bạn là: " . $userInfo['mat_khau'];  // Trả mật khẩu từ db
                } else {
                    $thongbao = "Tên đăng nhập hoặc email không đúng.";
                }
            }
            include "./view/user/forgotPassword.php";  // Chuyển hướng đến trang quên mật khẩu
            break;

        case 'logOut':
            // Xóa dữ liệu session và chuyển hướng về trang chính
            session_unset();
            session_destroy();
            header("Location: index.php");
            break;

        case 'Notification':
            include "View/Notification.php";
            break;
        case 'search':
            include "View/search.php";
            break;
        default:
            include "View/home.php";
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
