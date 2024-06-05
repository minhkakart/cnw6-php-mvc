<?php

$title = 'Create new book';

include_once HEADER;

?>
<h1>Thêm mới</h1>
<form action="<?php echo DOMAIN ?>?controller=book&action=store" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Tên</label>
        <input type="text" class="form-control" id="name" name="name" value="" required>
    </div>
    <div class="mb-3">
        <label for="author" class="form-label">Tác giả</label>
        <input type="text" class="form-control" id="author" name="author" value="" required>
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
    <a name="" id="" class="btn btn-primary" href="<?php echo DOMAIN ?>?controller=book" role="button">Quay lại</a>
</form>
<?php

include_once FOOTER;

?>