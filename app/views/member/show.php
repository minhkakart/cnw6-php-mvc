<?php
$title = 'Member details';
include HEADER;
?>

<h1>Xem thông tin</h1>
<div class="mb-3">
    <label for="id" class="form-label">Mã</label>
    <input type="text" class="form-control" id="id" name="id" value="<?php echo $data['member']->getId(); ?>" readonly>
</div>
<div class="mb-3">
    <label for="username" class="form-label">Tên tài khoản</label>
    <input type="text" class="form-control" id="username" name="username" value="<?php echo $data['member']->getUsername(); ?>"
        readonly>
</div>
<div class="mb-3">
    <label for="password" class="form-label">Mật khẩu</label>
    <input type="text" class="form-control" id="password" name="password" value="<?php echo $data['member']->getPassword(); ?>"
        readonly>
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" id="email" name="email" value="<?php echo $data['member']->getEmail(); ?>"
        readonly>
</div>
<div class="mb-3">
    <label for="phone" class="form-label">Số điện thoại</label>
    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $data['member']->getPhone(); ?>"
        readonly>
</div>
<?php
include FOOTER;
?>