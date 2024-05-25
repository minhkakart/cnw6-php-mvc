<?php
require_once APP_ROOT . 'app/controllers/Controller.php';
require_once APP_ROOT . 'app/services/PatientService.php';
class HomeController extends Controller
{
    public function index()
    {
        $patientService = new PatientService();
        $patients = $patientService->getAllPatients();
        $this->view('home/index', ['patients' => $patients]);
    }
}