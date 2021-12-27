<?php

require_once(__DIR__ . '/../config/Connection.php');
class autorModelo
{
    private $table = "autor";
    private  $conn;

    public function __construct()
    {
        $this->conn = new Connection();
        $this->conn = $this->conn->connect();
    }

    public function fetch_all()
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $this->table");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
    }

    public function validate_duplicate_name($nombre)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE autor_nombre = :autor_nombre ");
            $stmt->bindParam(":autor_nombre", $nombre, PDO::PARAM_STR);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
    }

    public function insert($nombre)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO $this->table(autor_nombre) VALUES(:autor_nombre)");
            $stmt->bindParam(":autor_nombre", $nombre, PDO::PARAM_STR);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE autor_id = :autor_id");
            $stmt->bindParam(":autor_id", $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
    }

    public function fetch($id)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE autor_id = :autor_id ");
            $stmt->bindParam(":autor_id", $id, PDO::PARAM_INT);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return $stmt->fetch(PDO::FETCH_OBJ);
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
    }

    public function update($nombre, $id)
    {
        try {
            $stmt = $this->conn->prepare("UPDATE $this->table SET autor_nombre = :autor_nombre WHERE autor_id = :autor_id");
            $stmt->bindParam(":autor_nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindParam(":autor_id", $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
    }
}
