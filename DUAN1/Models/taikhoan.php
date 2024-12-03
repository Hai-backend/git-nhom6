<?php
function insert_taikhoan($ten_dang_nhap, $mat_khau, $ho_ten, $email, $so_dienthoai, $dia_chi, $vai_tro = 'client')
{
    // Chèn dữ liệu vào bảng `tai_khoan` với các cột tương ứng
    $sql = "INSERT INTO tai_khoan (ten_dang_nhap, mat_khau, ho_ten, email, so_dienthoai, dia_chi, vai_tro) 
            VALUES ('$ten_dang_nhap', '$mat_khau', '$ho_ten', '$email', '$so_dienthoai', '$dia_chi', '$vai_tro')";
    pdo_execute($sql);
}



function checkuser($ten_dang_nhap, $mat_khau)
{
    // Kiểm tra thông tin đăng nhập
    $sql = "SELECT * FROM tai_khoan 
            WHERE ten_dang_nhap = '$ten_dang_nhap' AND mat_khau = '$mat_khau'";
    $sp = pdo_query_one($sql);
    return $sp;
}

function update_user($id, $ten_dang_nhap, $mat_khau, $ho_ten, $email, $so_dienthoai, $dia_chi, $vai_tro)
{
    // Kiểm tra giá trị vai_tro
    if ($vai_tro !== 'client' && $vai_tro !== 'admin') {
        // Nếu giá trị vai_tro không hợp lệ, bạn có thể xử lý ở đây
        $vai_tro = 'client';  // Hoặc đặt giá trị mặc định
    }

    // Cập nhật dữ liệu vào DB
    $sql = "UPDATE tai_khoan 
            SET ten_dang_nhap = '$ten_dang_nhap', 
                mat_khau = '$mat_khau', 
                ho_ten = '$ho_ten', 
                email = '$email', 
                so_dienthoai = '$so_dienthoai', 
                dia_chi = '$dia_chi', 
                vai_tro = '$vai_tro' 
            WHERE id = $id";
    pdo_execute($sql);
}


function checkuser_by_id($id)
{
    if (!$id) {
        return null;  // Trả về null nếu ID không hợp lệ
    }

    $sql = "SELECT * FROM tai_khoan WHERE id = $id";
    $result = pdo_query_one($sql);
    return $result;
}


function checkuser_by_email($ten_dang_nhap, $email)
{
    $sql = "SELECT * FROM tai_khoan WHERE ten_dang_nhap = '$ten_dang_nhap' AND email = '$email'";
    $user = pdo_query_one($sql);  // Hàm lấy 1 bản ghi người dùng
    return $user;
}

function loadAll_khachhang()
{
    $sql = "SELECT * FROM tai_khoan ORDER BY id DESC";
    return pdo_query($sql);
}


function delete_khachhang($id)
{
    $sql = "DELETE FROM tai_khoan WHERE id = " . intval($id);
    pdo_execute($sql);
}
