<?php

// Xóa toàn bộ session
session_unset();
session_destroy();

header("Location: View/user/signIn.php"); // Quay lại trang đăng nhập
exit;
?>
