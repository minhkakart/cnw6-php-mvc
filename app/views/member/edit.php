<?php
$title = 'Sửa thành viên';
include HEADER;
?>
<form action="<?php echo DOMAIN ?>?controller=member&action=update" method="post">
    <div class="mb-3">
        <label for="id" class="form-label">Mã</label>
        <input type="text" class="form-control" id="id" name="id" value="<?php echo $data['member']->getId(); ?>"
            readonly>
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">Tên tài khoản</label>
        <input type="text" class="form-control" id="username" name="username" value="<?= $data['member']->getUsername() ?>">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mật khẩu</label>
        <input type="text" class="form-control" id="password" name="password" value="<?= $data['member']->getPassword() ?>">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="<?= $data['member']->getEmail() ?>">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Số điện thoại</label>
        <input type="text" class="form-control" id="phone" name="phone" value="<?= $data['member']->getPhone() ?>">
    </div>
    <button type="submit" class="btn btn-primary">
        Lưu
    </button>

</form>
<?php
include FOOTER;
?>