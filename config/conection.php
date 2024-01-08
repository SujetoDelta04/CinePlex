<?php

class connection
{
    private $host;
    private $dbname;
    private $username;
    private $pass;
    private $db;

    public function __construct()
    {
        try
        {
            $this->host="mysql:host=localhost:3307";
            $this->dbname="cineplex";
            $this->username="root";
            $this->pass="12345678";

            $this->db=new PDO($this->host. "; dbname=" . $this->dbname . ";", $this->username, $this->pass);
            //* Ayuda a la hora de encontrar los errores mencionados por catch
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // echo "Conexion establecida";
        }
        catch(PDOException $e)
        {
            echo "Error " . $e->getMessage();
        }
    }
    public function start_connection()
    {
        return $this->db;
    }

}

?>