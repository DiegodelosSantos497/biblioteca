<?php

require_once(__DIR__ . '/../config/Connection.php');
class UsuarioModelo
{
    private $table = "usuario";
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

    public function validate_duplicate_email($email)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE usuario_email = :usuario_email ");
            $stmt->bindParam(":usuario_email", $email, PDO::PARAM_STR);
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

    public function insert($nombre, $apellido, $email, $clave)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO $this->table(usuario_nombre, usuario_apellido, usuario_email, usuario_clave) VALUES(:usuario_nombre, :usuario_apellido, :usuario_email, :usuario_clave)");
            $stmt->bindParam(":usuario_nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindParam(":usuario_apellido", $apellido, PDO::PARAM_STR);
            $stmt->bindParam(":usuario_email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":usuario_clave", $clave, PDO::PARAM_STR);
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
            $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE usuario_id = :usuario_id");
            $stmt->bindParam(":usuario_id", $id, PDO::PARAM_INT);
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
            $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE usuario_id = :usuario_id ");
            $stmt->bindParam(":usuario_id", $id, PDO::PARAM_INT);
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

    public function update($nombre, $apellido, $email, $clave, $id)
    {
        try {
            $stmt = $this->conn->prepare("UPDATE $this->table SET usuario_nombre = :usuario_nombre, usuario_apellido = :usuario_apellido, usuario_email = :usuario_email, usuario_clave = :usuario_clave WHERE usuario_id = :usuario_id");
            $stmt->bindParam(":usuario_nombre", $nombre, PDO::PARAM_STR);
            $stmt->bindParam(":usuario_apellido", $apellido, PDO::PARAM_STR);
            $stmt->bindParam(":usuario_email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":usuario_clave", $clave, PDO::PARAM_STR);
            $stmt->bindParam(":usuario_id", $id, PDO::PARAM_INT);
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

    public function login($email, $clave)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE usuario_email = :usuario_email AND usuario_clave = :usuario_clave");
        $stmt->bindValue(":usuario_email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":usuario_clave", $clave, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_OBJ);
        } else {
            return false;
        }
    }
}
