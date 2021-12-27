<?php
class Connection
{
    private $host = "localhost";
    private $dbname = "biblioteca";
    private $user = "root";
    private $pass = "";
    private $charset = "utf8";
    private $conn;

    public function connect()
    {
        if (!isset($this->conn)) {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=".$this->charset;
            try {
                $this->conn = new PDO($dsn, $this->user, $this->pass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //echo "successfully connection ";
            } catch (PDOException $e) {
                
                print($e->getMessage());
                die();
            }
        }
        return $this->conn;
    }
}

