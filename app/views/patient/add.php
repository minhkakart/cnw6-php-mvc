<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
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
        <a name="" id="" class="btn btn-primary" href="<?php echo DOMAIN ?>"
            role="button">Quay lại</a>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>