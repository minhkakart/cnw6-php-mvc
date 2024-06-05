<?php
require_once APP_ROOT . 'app/libs/DbConnection.php';
require_once APP_ROOT . 'app/models/Member.php';

class MemberService
{
    public function getAllMembers(): array
    {
        $members = [];
        $db = new DbConnection();
        $conn = $db->getConnection();
        $sql = "SELECT * FROM Member";
        $result = $conn->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $member = new Member($row['id'], $row['username'], $row['password'], $row['email'], $row['phone']);
                $members[] = $member;
            }
        }

        return $members;
    }

    public function getMemberById($id): ?Member
    {
        $db = new DbConnection();
        $conn = $db->getConnection();
        $sql = "SELECT * FROM Member WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch();
        if ($row) {
            return new Member($row['id'], $row['username'], $row['password'], $row['email'], $row['phone']);
        } else {
            return null;
        }
    }

    public function store(Member $member): bool
    {
        $db = new DbConnection();
        $conn = $db->getConnection();
        $sql = 'INSERT INTO Member(username, password, email, phone) VALUES (?, ?, ?, ?)';
        $stmt = $conn->prepare($sql);
        $username = $member->getUsername();
        $password = $member->getPassword();
        $email = $member->getEmail();
        $phone = $member->getPhone();
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $password);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $phone);
        return $stmt->execute();
    }

    public function update(Member $member): bool
    {
        $db = new DbConnection();
        $conn = $db->getConnection();
        $sql = 'UPDATE `Member` SET `username`=?, `password`=?,`email`=?,`phone`=? WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $id = $member->getId();
        $username = $member->getUsername();
        $password = $member->getPassword();
        $email = $member->getEmail();
        $phone = $member->getPhone();
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $password);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $phone);
        $stmt->bindParam(5, $id);
        return $stmt->execute();
    }

    public function delete($id): bool
    {
        $db = new DbConnection();
        $conn = $db->getConnection();
        $sql = 'DELETE FROM Member WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }

}