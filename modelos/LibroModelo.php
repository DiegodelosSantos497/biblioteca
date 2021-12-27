<?php

require_once(__DIR__ . '/../config/Connection.php');
class LibroModelo
{
    private $table = "libro";
    private  $conn;

    public function __construct()
    {
        $this->conn = new Connection();
        $this->conn = $this->conn->connect();
    }

    public function fetch_all()
    {
        try {
            $stmt = $this->conn->prepare("SELECT
            $this->table.libro_id,
            $this->table.libro_isbn,
            $this->table.libro_titulo,
            $this->table.libro_fecha,
            $this->table.libro_edicion,
            $this->table.libro_foto,
            area.area_nombre AS area,
            autor.autor_nombre as autor,
            editorial.editorial_nombre as editorial,
            pais.pais_nombre as  pais,
            tipo.tipo_nombre as tipo    
        FROM
            `libro`
        INNER JOIN area ON $this->table.libro_area_id = area.area_id
        INNER JOIN autor on $this->table.libro_autor_id = autor.autor_id
        INNER JOIN editorial ON $this->table.libro_editorial_id = editorial.editorial_id
        INNER JOIN pais on $this->table.libro_pais_id = pais.pais_id
        INNER JOIN tipo on $this->table.libro_tipo_id = tipo.tipo_id");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
    }

    public function fetch_all_tables($tables)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $tables");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $e) {
            print($e->getMessage());
            die();
        }
    }

    public function validate_duplicate_title($titulo)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE libro_titulo = :libro_titulo ");
            $stmt->bindParam(":libro_titulo", $titulo, PDO::PARAM_STR);
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

    public function insert($isbn, $titulo, $area, $autor, $editorial, $pais, $tipo, $fecha, $edicion, $foto, $url)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO $this->table(libro_isbn, libro_titulo, libro_area_id, libro_autor_id, libro_editorial_id, libro_pais_id, libro_tipo_id, libro_fecha, libro_edicion, libro_foto, libro_url) VALUES(:libro_isbn, :libro_titulo, :libro_area_id, :libro_autor_id, :libro_editorial_id, :libro_pais_id, :libro_tipo_id, :libro_fecha, :libro_edicion, :libro_foto, :libro_url)");
            $stmt->bindParam(":libro_isbn", $isbn, PDO::PARAM_STR);
            $stmt->bindParam(":libro_titulo", $titulo, PDO::PARAM_STR);
            $stmt->bindParam(":libro_area_id", $area, PDO::PARAM_INT);
            $stmt->bindParam(":libro_autor_id", $autor, PDO::PARAM_INT);
            $stmt->bindParam(":libro_editorial_id", $editorial, PDO::PARAM_INT);
            $stmt->bindParam(":libro_pais_id", $pais, PDO::PARAM_INT);
            $stmt->bindParam(":libro_tipo_id", $tipo, PDO::PARAM_INT);
            $stmt->bindParam(":libro_fecha", $fecha, PDO::PARAM_STR);
            $stmt->bindParam(":libro_edicion", $edicion, PDO::PARAM_STR);
            $stmt->bindParam(":libro_foto", $foto, PDO::PARAM_STR);
            $stmt->bindParam(":libro_url", $url, PDO::PARAM_STR);
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
            $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE libro_id = :libro_id");
            $stmt->bindParam(":libro_id", $id, PDO::PARAM_INT);
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
            $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE libro_id = :libro_id ");
            $stmt->bindParam(":libro_id", $id, PDO::PARAM_INT);
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

    public function update($isbn, $titulo, $area, $autor, $editorial, $pais, $tipo, $fecha, $edicion, $foto, $url, $id)
    {
        try {
            $stmt = $this->conn->prepare("UPDATE $this->table SET libro_isbn = :libro_isbn,libro_titulo = :libro_titulo,libro_area_id = :libro_area_id,libro_autor_id = :libro_autor_id,libro_editorial_id = :libro_editorial_id,libro_pais_id = :libro_pais_id,libro_tipo_id = :libro_tipo_id,libro_fecha = :libro_fecha,libro_edicion = :libro_edicion,libro_foto = :libro_foto,libro_url = :libro_url WHERE libro_id = :libro_id");
            $stmt->bindParam(":libro_isbn", $isbn, PDO::PARAM_STR);
            $stmt->bindParam(":libro_titulo", $titulo, PDO::PARAM_STR);
            $stmt->bindParam(":libro_area_id", $area, PDO::PARAM_INT);
            $stmt->bindParam(":libro_autor_id", $autor, PDO::PARAM_INT);
            $stmt->bindParam(":libro_editorial_id", $editorial, PDO::PARAM_INT);
            $stmt->bindParam(":libro_pais_id", $pais, PDO::PARAM_INT);
            $stmt->bindParam(":libro_tipo_id", $tipo, PDO::PARAM_INT);
            $stmt->bindParam(":libro_fecha", $fecha, PDO::PARAM_STR);
            $stmt->bindParam(":libro_edicion", $edicion, PDO::PARAM_STR);
            $stmt->bindParam(":libro_foto", $foto, PDO::PARAM_STR);
            $stmt->bindParam(":libro_url", $url, PDO::PARAM_STR);
            $stmt->bindParam(":libro_id", $id, PDO::PARAM_INT);
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
