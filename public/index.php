<?php
require_once '../app/config/config.php';
require_once APP_ROOT . 'app/controllers/PatientController.php';
require_once APP_ROOT . 'app/controllers/HomeController.php';
// Check if the controller and action are set
if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
} else {
    $controller = 'home';
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'index';
}
if ($controller == 'home') {
    $controllerObj = new HomeController();
    switch ($action) {
        case 'index':
            $controllerObj->index();
            break;
        default:
            $data['error'] = 'Controller or action does not exist!';
            include APP_ROOT . 'app/views/error/notfound.php';
            break;
    }
} else if ($controller == 'patient') {
    $controllerObj = new PatientController();
    switch ($action) {
        case 'index':
            $controllerObj->index();
            break;
        case 'show':
            $controllerObj->show();
            break;
        case 'create':
            $controllerObj->create();
            break;
        case 'store':
            $controllerObj->store();
            break;
        case 'edit':
            $controllerObj->edit();
            break;
        case 'update':
            $controllerObj->update();
            break;
        case 'delete':
            $controllerObj->delete();
            break;
        default:
            $data['error'] = 'Controller or action does not exist!';
            include APP_ROOT . 'app/views/error/notfound.php';
            break;
    }
}