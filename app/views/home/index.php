<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container">
        <a name="" id="" class="btn btn-primary" href="<?php echo DOMAIN ?>?controller=patient&action=create"
            role="button">Thêm mới</a>

        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped table-light table-sm table-responsive">
                <thead>
                    <tr>
                        <th scope="col">Mã</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Giới tính</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['patients'] as $key => $patient): ?>
                        <tr class="">
                            <td scope="row"><?php echo $patient->getId(); ?></td>
                            <td><?php echo $patient->getName(); ?></td>
                            <td><?php echo $patient->getGender() == '0' ? 'Nữ' : 'Nam'; ?></td>
                            <td>
                                <a href="<?php echo DOMAIN ?>?controller=patient&action=show&id=<?php echo $patient->getId(); ?>"
                                    class="btn btn-info ">Xem</a>
                                <a href="<?php echo DOMAIN ?>?controller=patient&action=edit&id=<?php echo $patient->getId(); ?>"
                                    class="btn btn-primary">Sửa</a>
                                <button id="btn_delete_<?php echo $patient->getId(); ?>"
                                    class="btn btn-danger ">Xóa</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('button[id^="btn_delete_"]').click(function () {
                var ma = $(this).attr('id').replace('btn_delete_', '');
                if (confirm('Bạn có chắc chắn muốn xóa?')) {
                    window.location.href = '<?php echo DOMAIN ?>?controller=patient&action=delete&id=' + ma;
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>