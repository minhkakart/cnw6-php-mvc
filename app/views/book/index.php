<?php
$title = 'Books';
include HEADER;
?>

<a name="" id="" class="btn btn-primary" href="<?= DOMAIN ?>?controller=book&action=create" role="button">Thêm
    mới</a>

<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped table-light table-sm table-responsive">
        <thead>
            <tr>
                <th scope="col">Mã</th>
                <th scope="col">Tên</th>
                <th scope="col">Tác giả</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['books'] as $key => $book): ?>
                <tr class="">
                    <td scope="row"><?= $book->id ?></td>
                    <td><?= $book->name ?></td>
                    <td><?= $book->author?></td>
                    <td>
                        <a href="<?= DOMAIN ?>?controller=book&action=show&id=<?= $book->id ?>"
                            class="btn btn-info ">Xem</a>
                        <a href="<?= DOMAIN ?>?controller=book&action=edit&id=<?= $book->id ?>"
                            class="btn btn-primary">Sửa</a>
                        <button id="btn_delete_<?= $book->id ?>" class="btn btn-danger ">Xóa</button>
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
                window.location.href = '<?= DOMAIN ?>?controller=book&action=delete&id=' + ma;
            }
        });
    });
</script>

<?php
include FOOTER;
?>