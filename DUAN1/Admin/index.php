<?php
include_once "header.php";
include "../Commons/function.php";
include "../Models/danhmuc.php";
include "../Models/sanpham.php";
include "../Models/binhluan.php";
include "../Models/taikhoan.php";


if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
            /**Controllers sản phẩm */
        case 'addsp':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $danh_muc_id = $_POST['danh_muc_id'];
                $ten_san_pham = $_POST['ten_san_pham'];
                $gia_san_pham = $_POST['gia_san_pham'];
                $thuong_hieu = $_POST['thuong_hieu'];
                $kich_thuoc = $_POST['kich_thuoc'];
                $mau_sac = $_POST['mau_sac'];
                $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
                $mo_ta = $_POST['mo_ta'];
                $hinh_anh = $_FILES['hinh_anh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($hinh_anh);
                if (move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file)) {
                } else {
                }
                insert_san_pham($ten_san_pham, $gia_san_pham, $thuong_hieu, $kich_thuoc, $mau_sac, $gia_khuyen_mai, $hinh_anh, $mo_ta, $danh_muc_id);
                $thongbao = "Thêm sản phẩm thành công!";
            }

            $listdm = loadall_danh_muc();
            include "sanpham/add.php";
            break;


        case 'listsp':
            $listsp = loadall_san_pham();
            include "sanpham/list.php";
            break;
        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_san_pham($_GET['id']);
            }
            $listsp = loadall_san_pham("", 0);
            include "sanpham/list.php";
            break;
        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_san_pham($_GET['id']);
            }
            $listdm = loadall_danh_muc();
            include "sanpham/update.php";
            break;

        case "updatesp":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $danh_muc_id = $_POST['danh_muc_id'];
                $ten_san_pham = $_POST['ten_san_pham'];
                $gia_san_pham = $_POST['gia_san_pham'];
                $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
                $thuong_hieu = $_POST['thuong_hieu'];
                $kich_thuoc = $_POST['kich_thuoc'];
                $mau_sac = $_POST['mau_sac'];
                $mo_ta = $_POST['mo_ta'];
                $hinh_anh = $_FILES['hinh_anh']['name'];
                if ($hinh_anh != "") {
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh_anh"]["name"]);
                    if (move_uploaded_file($_FILES["hinh_anh"]["tmp_name"], $target_file)) {
                    } else {
                    }
                } else {
                    $sanpham = loadone_san_pham($id);
                    $hinh_anh = $sanpham['hinh_anh'];
                }
                update_san_pham($id, $ten_san_pham, $gia_san_pham, $thuong_hieu, $kich_thuoc, $mau_sac, $gia_khuyen_mai, $hinh_anh, $mo_ta, $danh_muc_id);
                $thongbao = "Cập nhật sản phẩm thành công!";
            }
            $listdm = loadall_danh_muc();
            $listsp = loadall_san_pham("", 0);
            include "sanpham/update.php";
            break;

        case 'delete_selected':
            if (isset($_POST['selected_ids']) && count($_POST['selected_ids']) > 0) {
                $selected_ids = $_POST['selected_ids'];
                foreach ($selected_ids as $id) {
                    delete_san_pham($id);
                }
                $thongbao = "Đã xóa thành công các mục đã chọn!";
            } else {
                $thongbao = "Vui lòng chọn ít nhất một mục để xóa.";
            }
            $listsp = loadall_san_pham();
            include "sanpham/list.php";
            break;

            /**Controllers Danh mục */

        case 'adddm':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $ten_danh_muc = $_POST['ten_danh_muc'];
                insert_danh_muc($ten_danh_muc);
                $thongbao = "Thêm thành công";
            }
            include "danhmuc/add.php";
            break;
        case 'listdm':
            $listdm = loadall_danh_muc();
            include "danhmuc/list.php";
            break;
        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danh_muc($_GET['id']);
            }
            $listdm = loadall_danh_muc();
            include "danhmuc/list.php";
            break;
        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadone_danh_muc($_GET['id']);
            }

            include "danhmuc/update.php";
            break;
        case 'updatedm':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $id = $_POST['id'];
                $ten_danh_muc = $_POST['ten_danh_muc'];
                update_danh_muc($id, $ten_danh_muc);
                $thongbao = "Cập nhật thành công!";
                include "danhmuc/update.php";
                exit();
            }
            break;

            // Controlers bình luận

        case 'dsbl':
            $listbl = loadall_binh_luan(0);
            include "binhluan/comment.php";
            break;
        case 'xoa_bl':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_binh_luan($_GET['id']);
            }
            $listbl = loadall_binh_luan(0);
            include "binhluan/comment.php";
            break;

            // Controllers tai khoan

        case 'listkh':
            $listCustomers = loadAll_khachhang();
            include "taikhoan/list.php";
            break;

        case 'suakh':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $customer = checkuser_by_id($_GET['id']);
            } else {
                $thongbao = "ID khách hàng không hợp lệ!";
                include "taikhoan/list.php";  // Quay lại trang danh sách nếu không có ID hợp lệ
                exit();
            }
            include "taikhoan/update.php";
            break;

        case 'updatekh':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $ten_dang_nhap = $_POST['ten_dang_nhap'];
                $mat_khau = $_POST['mat_khau'];
                $ho_ten = $_POST['ho_ten'];
                $email = $_POST['email'];
                $so_dienthoai = $_POST['so_dienthoai'];
                $dia_chi = $_POST['dia_chi'];
                $vai_tro = $_POST['vai_tro'];

                // Cập nhật thông tin khách hàng vào DB
                update_user($id, $ten_dang_nhap, $mat_khau, $ho_ten, $email, $so_dienthoai, $dia_chi, $vai_tro);
                $thongbao = "Cập nhật tài khoản thành công!";
            }

            $customer = checkuser_by_id($id);
            include "taikhoan/update.php";
            break;

        case 'xoakh':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_khachhang($_GET['id']);
                $thongbao = "Xóa khách hàng thành công!";
            }
            $listCustomers = loadAll_khachhang();
            include "taikhoan/list.php";
            break;
    }
} else {
    include "home.php";
}

include "footer.php";
