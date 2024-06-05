<?php

$title = 'Patient detail';

include_once HEADER;

?>
<h1>Xem thông tin</h1>
<!-- <form action="<?php echo DOMAIN ?>?controller=patient&action=update" method="post"> -->
    <div class="mb-3">
        <label for="id" class="form-label">Mã</label>
        <input type="text" class="form-control" id="id" name="id" value="<?php echo $data['patient']->getId(); ?>"
            readonly>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Tên</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $data['patient']->getName(); ?>"
            readonly>
    </div>
    <div class="mb-3">
        <label class="form-label">Giới tính</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" value="1" id="1" <?php echo $data['patient']->getGender() == 1 ? 'checked' : ''; ?> disabled />
            <label class="form-check-label" for="1"> Nam </label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" value="0" id="0" <?php echo $data['patient']->getGender() == 0 ? 'checked' : ''; ?> disabled />
            <label class="form-check-label" for="0"> Nữ </label>
        </div>
    </div>
<!-- </form> -->
<?php

include_once FOOTER;

?>