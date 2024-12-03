<div class="container mt-5">
    <h2 class="text-center mb-4">Danh Sách Sản Phẩm</h2>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Tên Sản Phẩm</th>
                <th>Giá Sản Phẩm</th>
                <th>Thương Hiệu</th>
                <th>Kích Thước</th>
                <th>Màu Sắc</th>
                <th>Hình Ảnh</th>
                <th>Mô Tả</th>
                <th>Chức Năng</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $listsp = loadall_san_pham();
            foreach ($listsp as $san_pham) {
                extract($san_pham);
                $hinh_anh_path = "../upload/" . $hinh_anh;

                echo "<tr>
                    <td>{$id}</td>
                    <td>{$ten_san_pham}</td>
                    <td>" . number_format($gia_san_pham, 0, ',', '.') . " VND</td>
                    <td>{$thuong_hieu}</td>
                    <td>{$kich_thuoc}</td>
                    <td>{$mau_sac}</td>
                    <td>
                    <img src='{$hinh_anh_path}' alt='{$hinh_anh}' style='max-width: 100px;'>
                    </td>
                    <td>{$mo_ta}</td>
                    <td>
                        <a href='index.php?act=suasp&id={$id}' class='btn btn-primary btn-sm'>Sửa</a>
                        <a href='index.php?act=xoasp&id={$id}' class='btn btn-danger btn-sm' onclick='return confirm(\"Bạn có chắc chắn muốn xóa sản phẩm này không?\")'>Xóa</a>
                </tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="index.php?act=addsp" class="btn btn-success">Thêm Sản Phẩm</a>
</div>