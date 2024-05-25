<?php
require_once APP_ROOT . 'app/libs/DbConnection.php';
require_once APP_ROOT . 'app/models/Patient.php';

class PatientService
{
    public function getAllPatients(): array
    {
        $patients = [];
        $db = new DbConnection();
        $conn = $db->getConnection();
        $sql = "SELECT * FROM patients";
        $result = $conn->query($sql);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $patient = new Patient($row['id'], $row['name'], $row['gender']);
                $patients[] = $patient;
            }
        }

        return $patients;
    }

    public function getPatientById($id): ?Patient
    {
        $db = new DbConnection();
        $conn = $db->getConnection();
        $sql = "SELECT * FROM patients WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch();
        if ($row) {
            return new Patient($row['id'], $row['name'], $row['gender']);
        } else {
            return null;
        }
    }

    public function store(Patient $patient): bool
    {
        $db = new DbConnection();
        $conn = $db->getConnection();
        $sql = 'INSERT INTO patients(name, gender) VALUES (?, ?)';
        $stmt = $conn->prepare($sql);
        $name = $patient->getName();
        $gender = $patient->getGender();
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $gender);
        return $stmt->execute();
    }

    public function update(Patient $patient): bool
    {
        $db = new DbConnection();
        $conn = $db->getConnection();
        $sql = 'UPDATE `patients` SET `name`=?,`gender`=? WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $id = $patient->getId();
        $name = $patient->getName();
        $gender = $patient->getGender();
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $gender);
        $stmt->bindParam(3, $id);
        return $stmt->execute();
    }

    public function delete($id): bool
    {
        $db = new DbConnection();
        $conn = $db->getConnection();
        $sql = 'DELETE FROM patients WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }

}