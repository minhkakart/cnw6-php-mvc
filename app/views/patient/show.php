<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
    <h1>Xem thông tin</h1>
    <form action="<?php echo DOMAIN ?>?controller=patient&action=update" method="post">
        <div class="mb-3">
            <label for="id" class="form-label">Mã</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $data['patient']->getId(); ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Tên</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $data['patient']->getName(); ?>" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label">Giới tính</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="1" id="1" <?php echo $data['patient']->getGender() == 1 ? 'checked' : ''; ?>  disabled />
                <label class="form-check-label" for="1"> Nam </label>
            </div>
            
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="0" id="0" <?php echo $data['patient']->getGender() == 0 ? 'checked' : ''; ?> disabled/>
                <label class="form-check-label" for="0"> Nữ </label>
            </div>
        </div>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>