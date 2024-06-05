<?php

$title = 'Add patient';

include_once HEADER;

?>
<h1>Thêm mới</h1>
<form action="<?php echo DOMAIN ?>?controller=patient&action=store" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Tên</label>
        <input type="text" class="form-control" id="name" name="name" value="" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Giới tính</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" value="1" id="1" checked />
            <label class="form-check-label" for="1"> Nam </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" value="0" id="0" />
            <label class="form-check-label" for="0"> Nữ </label>
        </div>

    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
    <a name="" id="" class="btn btn-primary" href="<?php echo DOMAIN ?>" role="button">Quay lại</a>
</form>
<?php

include_once FOOTER;

?>