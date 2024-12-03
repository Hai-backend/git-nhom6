<?php
function insert_danh_muc($ten_danh_muc)
{
    $sql = "INSERT INTO danh_muc(ten_danh_muc) VALUES('$ten_danh_muc')";
    pdo_execute($sql);
}

function delete_danh_muc($id)
{
    $sql = "DELETE FROM danh_muc WHERE id = " . intval($id);
    pdo_execute($sql);
}

function loadall_danh_muc()
{
    $sql = "SELECT * FROM danh_muc ORDER BY id DESC";
    $listdm = pdo_query($sql);
    return $listdm;
}

function loadone_danh_muc($id)
{
    $sql = "SELECT * FROM danh_muc WHERE id = " . intval($id);
    $dm = pdo_query_one($sql);
    return $dm;
}

function update_danh_muc($id, $ten_danh_muc)
{
    $sql = "UPDATE danh_muc SET ten_danh_muc = '$ten_danh_muc' WHERE id = " . intval($id);
    pdo_execute($sql);
}
