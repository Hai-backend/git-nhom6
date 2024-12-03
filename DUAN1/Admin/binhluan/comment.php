<div class="container mt-5">
    <h2 class="text-center mb-4">Danh sách bình luận</h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Sản phẩm</th>
                <th>Nội dung</th>
                <th>Người dùng</th>
                <th>Ngày đăng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $listbl = loadall_binh_luan();
            foreach ($listbl as $bl) {
                extract($bl);
                $xoabl = "index.php?act=xoa_bl&id=" . $bl["id"];
                echo "<tr>
                    <td>{$id}</td>
                    <td>{$san_pham_id}</td>
                    <td>{$noi_dung}</td>
                    <td>{$ten_nguoi_dung}</td>
                    <td>{$ngay_dang}</td>
                    <td>
                        <a href='$xoabl' class='btn btn-danger btn-sm'>Xóa</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>