<form method="POST" action="index.php?act=delete_selected">
    <div class="container mt-5">
        <h1>Danh Sách Danh Mục</h1>
        <?php if (isset($thongbao)) { ?>
            <div class="alert alert-success">
                <?php echo $thongbao; ?>
            </div>
        <?php } ?>

        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th><input type="checkbox" id="select_all"></th>
                    <th>Mã Danh Mục</th>
                    <th>Tên Danh Mục</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listdm as $danh_muc) {
                    extract($danh_muc);
                    $suadm = "index.php?act=suadm&id=" . $danh_muc["id"];
                    $xoadm = "index.php?act=xoadm&id=" . $danh_muc["id"];
                    echo "<tr>
                        <td><input type='checkbox' name='selected_ids[]' value='" . $danh_muc["id"] . "'></td>
                        <td>" . $danh_muc["id"] . "</td>
                        <td>" . $danh_muc["ten_danh_muc"] . "</td>
                        <td>
                            <a href='$suadm' class='btn btn-primary btn-sm'>Sửa</a>
                            <a href='$xoadm' class='btn btn-primary btn-sm' onclick='return confirm(\"Bạn có chắc chắn muốn xóa sản phẩm này không?\")'>Xóa</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="row mb-3">
            <div class="col">
                <input type="submit" class="btn btn-danger" value="Xóa các mục đã chọn">
                <a href="index.php?act=adddm" class="btn btn-success">Nhập Thêm</a>
            </div>
        </div>
    </div>
</form>

<script>
    document.getElementById('select_all').addEventListener('change', function() {
        let checkboxes = document.querySelectorAll('input[name="selected_ids[]"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = this.checked;
        });
    });
</script>