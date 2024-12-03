<?php
function getProductDetail($id)
{
    $sql = "SELECT * FROM san_pham where id='$id'";
    $sp = pdo_query_one($sql);
    return $sp;
}
