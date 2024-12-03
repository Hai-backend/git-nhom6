<?php
function insert_binh_luan($noi_dung, $san_pham_id, $tai_khoan_id)
{
    $sql = "INSERT INTO binh_luan(noi_dung, san_pham_id, tai_khoan_id, ngay_dang) 
            VALUES ('$noi_dung', $san_pham_id, $tai_khoan_id, NOW())";
    pdo_execute($sql);
}

function loadall_binh_luan($san_pham_id = 0)
{
    $sql = "SELECT binh_luan.id, binh_luan.noi_dung, binh_luan.san_pham_id, binh_luan.ngay_dang, 
                   binh_luan.tai_khoan_id, tai_khoan.ho_ten AS ten_nguoi_dung 
            FROM binh_luan 
            JOIN tai_khoan ON binh_luan.tai_khoan_id = tai_khoan.id";

    if ($san_pham_id > 0) {
        $sql .= " WHERE binh_luan.san_pham_id = ? ORDER BY binh_luan.ngay_dang DESC";
        return pdo_query($sql, [$san_pham_id]);
    }

    $sql .= " ORDER BY binh_luan.ngay_dang DESC";
    return pdo_query($sql);
}

function delete_binh_luan($id)
{
    $sql = "DELETE FROM binh_luan WHERE id = " . intval($id);
    pdo_execute($sql);
}
