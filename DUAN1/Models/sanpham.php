<?php
function insert_san_pham($ten_san_pham, $gia_san_pham, $thuong_hieu, $kich_thuoc, $mau_sac, $gia_khuyen_mai, $hinh_anh, $mo_ta, $danh_muc_id)
{
    $sql = "INSERT INTO san_pham(ten_san_pham,gia_san_pham,thuong_hieu,kich_thuoc,mau_sac,gia_khuyen_mai,hinh_anh,mo_ta,danh_muc_id) VALUES('$ten_san_pham','$gia_san_pham','$thuong_hieu','$kich_thuoc','$mau_sac','$gia_khuyen_mai','$hinh_anh','$mo_ta','$danh_muc_id')";
    pdo_execute($sql);
}

function loadall_san_pham($kyw = "", $danh_muc_id = 0)
{
    $sql = "SELECT * FROM san_pham WHERE 1";
    if ($kyw != "") {
        $sql .= " AND ten_san_pham LIKE '%" . $kyw . "%'"; // Changed 'name' to 'ten_san_pham'
    }
    if ($danh_muc_id > 0) {
        $sql .= " AND danh_muc_id = '" . $danh_muc_id . "'";
    }
    $sql .= " ORDER BY id DESC";
    $listdm = pdo_query($sql);
    return $listdm;
}


function loadone_san_pham($id)
{
    $sql = "SELECT * FROM san_pham WHERE id = $id";
    return pdo_query_one($sql);
}

function delete_san_pham($id)
{
    $sql = "DELETE FROM san_pham WHERE id = " . $id;
    pdo_execute($sql);
}

function loadall_san_pham_noi()
{
    $sql = "SELECT * FROM san_pham WHERE 1 ORDER BY luot_xem DESC LIMIT 0,4";

    $listsp = pdo_query($sql);
    return $listsp;
}

function loadall_sanpham_home()
{
    $sql = "SELECT * FROM san_pham WHERE 1 ORDER BY id DESC LIMIT 0,12";

    $listdm = pdo_query($sql);
    return $listdm;
}

function loadone_tendm($danh_muc_id)
{
    if ($danh_muc_id > 0) {
        $sql = "SELECT * FROM danh_muc WHERE id=" . $danh_muc_id;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $ten_danh_muc;
    } else {
        return "";
    }
}

function update_san_pham($id, $ten_san_pham, $gia_san_pham, $thuong_hieu, $kich_thuoc, $mau_sac, $gia_khuyen_mai, $hinh_anh, $mo_ta, $danh_muc_id)
{
    $sql = "UPDATE san_pham SET 
                danh_muc_id='$danh_muc_id',
                ten_san_pham='$ten_san_pham',
                gia_san_pham='$gia_san_pham',
                thuong_hieu='$thuong_hieu',
                kich_thuoc='$kich_thuoc',
                mau_sac='$mau_sac',
                gia_khuyen_mai='$gia_khuyen_mai',
                mo_ta='$mo_ta'";

    if ($hinh_anh != "") {
        $sql .= ", hinh_anh='$hinh_anh'";
    }

    $sql .= " WHERE id= $id";

    return pdo_execute($sql);
}
