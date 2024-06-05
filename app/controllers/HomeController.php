<?php
require_once APP_ROOT . 'app/controllers/Controller.php';
require_once APP_ROOT . 'app/services/PatientService.php';
class HomeController extends Controller
{
    public function index()
    {
        $this->view('home/index');
    }
}