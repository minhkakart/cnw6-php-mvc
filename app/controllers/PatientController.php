<?php
require_once APP_ROOT . 'app/controllers/Controller.php';
require_once APP_ROOT . 'app/services/PatientService.php';
class PatientController extends Controller
{
    private const HOME_PAGE = DOMAIN . '?controller=patient';
    public function index()
    {
        $patientService = new PatientService();
        $patients = $patientService->getAllPatients();
        $this->view('patient/index', ['patients' => $patients]);
    }

    public function create()
    {
        $this->view('patient/add');
    }

    public function store()
    {
        $name = $_POST['name'];
        $gender = $_POST['gender'];

        $modifiedPatient = new Patient(null, $name, $gender);
        
        $patientService = new PatientService();
        $success = $patientService->store($modifiedPatient); 
        if ($success){
            $this->redirect(PatientController::HOME_PAGE);
        } else{
            $this->view('error/notfound');
        }
    }

    public function show()
    {
        if (!isset($_GET['id'])){
            $this->view('error/notfound', ['error' => 'Patient ID is required']);
            return;
        }

        $id = $_GET['id'];
        $patientService = new PatientService();
        $patient = $patientService->getPatientById($id);
        if ($patient) {
            $this->view('patient/show', ['patient' => $patient]);
        } else {
            $this->view('error/notfound');
        }
    }

    public function edit(){
        if (!isset($_GET['id'])){
            $this->view('error/notfound', ['error' => 'Patient ID is required']);
            return;
        }
        $patientService = new PatientService();
        $patient = $patientService->getPatientById($_GET['id']);
        $this->view('patient/edit', ['patient' => $patient]);
    }

    public function update(){
        if (!isset($_POST['id'])){
            $this->view('error/notfound', ['error' => 'Patient ID is required']);
            return;
        }
        $id = $_POST['id'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];

        $modifiedPatient = new Patient($id, $name, $gender);
        
        $patientService = new PatientService();
        $success = $patientService->update($modifiedPatient);
        if ($success){
            $this->redirect(PatientController::HOME_PAGE);
        } else{
            $this->view('error/notfound');
        }
    }

    public function delete(){
        if (!isset($_GET['id'])){
            $this->view('error/notfound', ['error' => 'Patient ID is required']);
            return;
        }

        $patientService = new PatientService();
        $id = $_GET['id'];
        $success = $patientService->delete($id);
        if ($success){
            $this->redirect(PatientController::HOME_PAGE);
        } else{
            $this->view('error/notfound');
        }
    }

}