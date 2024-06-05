<?php
require_once APP_ROOT . 'app/controllers/Controller.php';
require_once APP_ROOT . 'app/services/BookService.php';
class BookController extends Controller
{
    private const HOME_PAGE = DOMAIN . '?controller=book';
    public function index()
    {
        $BookService = new BookService();
        $Books = $BookService->getAllBooks();
        $this->view('book/index', ['books' => $Books]);
    }

    public function create()
    {
        $this->view('book/create');
    }

    public function store()
    {
        $name = $_POST['name'];
        $author = $_POST['author'];

        $newBook = new Book(null, $name, $author);
        
        $BookService = new BookService();
        $success = $BookService->store($newBook); 
        if ($success){
            $this->redirect(BookController::HOME_PAGE);
        } else{
            $this->view('error/notfound', ['error' => 'Failed to store Book']);
        }
    }

    public function show()
    {
        if (!isset($_GET['id'])){
            $this->view('error/notfound', ['error' => 'Book ID is required']);
            return;
        }

        $id = $_GET['id'];
        $BookService = new BookService();
        $Book = $BookService->getBookById($id);
        if ($Book) {
            $this->view('book/show', ['book' => $Book]);
        } else {
            $this->view('error/notfound', ['error' => 'Book not found']);
        }
    }

    public function edit(){
        if (!isset($_GET['id'])){
            $this->view('error/notfound', ['error' => 'Book ID is required']);
            return;
        }
        $id = $_GET['id'];
        $BookService = new BookService();
        $Book = $BookService->getBookById($id);
        $this->view('book/edit', ['book' => $Book]);
    }

    public function update(){
        if (!isset($_POST['id'])){
            $this->view('error/notfound', ['error' => 'Book ID is required']);
            return;
        }
        $id = $_POST['id'];
        $name = $_POST['name'];
        $author = $_POST['author'];

        $modifiedBook = new Book($id, $name, $author);
        
        $BookService = new BookService();
        $success = $BookService->update($modifiedBook);
        print_r($modifiedBook);
        // die();
        if ($success){
            $this->redirect(BookController::HOME_PAGE);
        } else{
            $this->view('error/notfound', ['error' => 'Failed to update Book']);
        }
    }

    public function delete(){
        if (!isset($_GET['id'])){
            $this->view('error/notfound', ['error' => 'Book ID is required']);
            return;
        }

        $BookService = new BookService();
        $id = $_GET['id'];
        $success = $BookService->delete($id);
        if ($success){
            $this->redirect(BookController::HOME_PAGE);
        } else{
            $this->view('error/notfound', ['error' => 'Failed to delete Book']);
        }
    }

}