<?php

$title = 'MVC';

include_once HEADER;

?>
<a name="" id="" class="btn btn-primary" href="<?php echo DOMAIN ?>?controller=member&action=create" role="button">Thêm
    mới</a>

<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped table-light table-sm table-responsive">
        <thead>
            <tr>
                <th scope="col">Mã</th>
                <th scope="col">Tên tài khoản</th>
                <th scope="col">Mật khẩu</th>
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['members'] as $key => $member): ?>
                <tr class="">
                    <td scope="row"><?php echo $member->getId(); ?></td>
                    <td><?php echo $member->getUsername(); ?></td>
                    <td><?php echo $member->getPassword(); ?></td>
                    <td><?php echo $member->getEmail() ?></td>
                    <td><?php echo $member->getPhone() ?></td>
                    <td>
                        <a href="<?php echo DOMAIN ?>?controller=member&action=show&id=<?php echo $member->getId(); ?>"
                            class="btn btn-info ">Xem</a>
                        <a href="<?php echo DOMAIN ?>?controller=member&action=edit&id=<?php echo $member->getId(); ?>"
                            class="btn btn-primary">Sửa</a>
                        <button id="btn_delete_<?php echo $member->getId(); ?>" class="btn btn-danger ">Xóa</button>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>

<script>
    $(document).ready(function () {
        $('button[id^="btn_delete_"]').click(function () {
            var ma = $(this).attr('id').replace('btn_delete_', '');
            if (confirm('Bạn có chắc chắn muốn xóa?')) {
                window.location.href = '<?php echo DOMAIN ?>?controller=member&action=delete&id=' + ma;
            }
        });
    });
</script>
<?php

include_once FOOTER;

?>