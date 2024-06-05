<?php
require_once APP_ROOT . 'app/libs/DbConnection.php';
require_once APP_ROOT . 'app/models/Book.php';

class BookService
{
    public function getAllBooks(): array
    {
        $Books = [];
        $db = new DbConnection();
        $conn = $db->getConnection();
        $sql = "SELECT * FROM Books";
        $result = $conn->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $Book = new Book($row['id'], $row['name'], $row['author']);
                $Books[] = $Book;
            }
        }

        return $Books;
    }

    public function getBookById($id): ?Book
    {
        $db = new DbConnection();
        $conn = $db->getConnection();
        $sql = "SELECT * FROM Books WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch();
        if ($row) {
            return new Book($row['id'], $row['name'], $row['author']);
        } else {
            return null;
        }
    }

    public function store(Book $Book): bool
    {
        $db = new DbConnection();
        $conn = $db->getConnection();
        $sql = 'INSERT INTO Books(name, author) VALUES (?, ?)';
        $stmt = $conn->prepare($sql);
        $name = $Book->name;
        $author = $Book->author;
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $author);
        return $stmt->execute();
    }

    public function update(Book $Book): bool
    {
        $db = new DbConnection();
        $conn = $db->getConnection();
        $sql = 'UPDATE Books SET name=?,author=? WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $id = $Book->id;
        $name = $Book->name;
        $author = $Book->author;
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $author);
        $stmt->bindParam(3, $id);
        return $stmt->execute();
    }

    public function delete($id): bool
    {
        $db = new DbConnection();
        $conn = $db->getConnection();
        $sql = 'DELETE FROM Books WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }

}