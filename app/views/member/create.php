<?php
$title = 'Tạo thành viên mới';
include HEADER;
?>
<form action="<?php echo DOMAIN ?>?controller=member&action=store" method="post">
    <div class="mb-3">
        <label for="username" class="form-label">Tên tài khoản</label>
        <input type="text" class="form-control" id="username" name="username">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mật khẩu</label>
        <input type="text" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Số điện thoại</label>
        <input type="text" class="form-control" id="phone" name="phone">
    </div>
    <button type="submit" class="btn btn-primary">
        Thêm mới
    </button>

</form>
<?php
include FOOTER;
?>