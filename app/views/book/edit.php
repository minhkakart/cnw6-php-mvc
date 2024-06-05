<?php

$title = 'Edit book';

include_once HEADER;

?>
<h1>Sửa</h1>
<form action="<?php echo DOMAIN ?>?controller=book&action=update" method="post">
    <div class="mb-3">
        <label for="id" class="form-label">Id</label>
        <input type="text" class="form-control" id="id" name="id" value="<?= $data['book']->id ?>" readonly>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Tên</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $data['book']->name ?>" required>
    </div>
    <div class="mb-3">
        <label for="author" class="form-label">Tác giả</label>
        <input type="text" class="form-control" id="author" name="author" value="<?= $data['book']->author ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
    <a name="" id="" class="btn btn-primary" href="<?php echo DOMAIN ?>?controller=book" role="button">Quay lại</a>
</form>
<?php

include_once FOOTER;

?>