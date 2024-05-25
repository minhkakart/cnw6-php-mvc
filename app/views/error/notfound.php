<!DOCTYPE html>
<html>
<head>
    <title>404 Not Found</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #f2f2f2;
        }
        h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #333;
        }
        p {
            font-size: 18px;
            margin-bottom: 20px;
            color: #666;
        }
    </style>
</head>
<body>
    <h1>404 Not Found</h1>
    <p>The page you are looking for could not be found.</p>
    <?php
    if (isset($data['error'])){
        echo '<p style="color: red;">' . $data['error'] . '</p>';
    }
    
    ?>
</body>
</html>