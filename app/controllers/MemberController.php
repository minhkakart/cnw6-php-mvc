<?php
require_once APP_ROOT . 'app/controllers/Controller.php';
require_once APP_ROOT . 'app/services/MemberService.php';
class MemberController extends Controller
{
    private const HOME_PAGE = DOMAIN . '?controller=member';
    public function index()
    {
        $memberService = new MemberService();
        $members = $memberService->getAllMembers();
        $this->view('member/index', ['members' => $members]);
    }

    public function create()
    {
        $this->view('member/create');
    }

    public function store()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $newMember = new Member(null, $username, $password, $email, $phone);
        
        $memberService = new MemberService();
        $success = $memberService->store($newMember); 
        if ($success){
            $this->redirect(MemberController::HOME_PAGE);
        } else{
            $this->view('error/notfound', ['error' => 'Failed to store member']);
        }
    }

    public function show()
    {
        if (!isset($_GET['id'])){
            $this->view('error/notfound', ['error' => 'Member ID is required']);
            return;
        }

        $id = $_GET['id'];
        $memberService = new MemberService();
        $member = $memberService->getMemberById($id);
        if ($member) {
            $this->view('member/show', ['member' => $member]);
        } else {
            $this->view('error/notfound', ['error' => 'Member not found']);
        }
    }

    public function edit(){
        if (!isset($_GET['id'])){
            $this->view('error/notfound', ['error' => 'Member ID is required']);
            return;
        }
        $id = $_GET['id'];
        $memberService = new MemberService();
        $member = $memberService->getMemberById($id);
        $this->view('member/edit', ['member' => $member]);
    }

    public function update(){
        if (!isset($_POST['id'])){
            $this->view('error/notfound', ['error' => 'Member ID is required']);
            return;
        }
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $modifiedMember = new Member($id, $username, $password, $email, $phone);
        
        $memberService = new MemberService();
        $success = $memberService->update($modifiedMember);
        if ($success){
            $this->redirect(MemberController::HOME_PAGE);
        } else{
            $this->view('error/notfound', ['error' => 'Failed to update member']);
        }
    }

    public function delete(){
        if (!isset($_GET['id'])){
            $this->view('error/notfound', ['error' => 'Member ID is required']);
            return;
        }

        $memberService = new MemberService();
        $id = $_GET['id'];
        $success = $memberService->delete($id);
        if ($success){
            $this->redirect(MemberController::HOME_PAGE);
        } else{
            $this->view('error/notfound', ['error' => 'Failed to delete member']);
        }
    }

}