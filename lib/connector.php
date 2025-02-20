<?php


class Connector
{
    // Properties
    private $query;
    private $dbConnector;

    // Config
    private $mysql_host;
    private $mysql_user;
    private $mysql_pwd;
    private $mysql_dbname;


    // Constructor
    public function __construct($mysql_host, $mysql_user, $mysql_pwd, $mysql_dbname)
    {
        $this->mysql_host = $mysql_host;
        $this->mysql_user = $mysql_user;
        $this->mysql_pwd = $mysql_pwd;
        $this->mysql_dbname = $mysql_dbname;
    }

    // Méthodes
    public function getCarts($query)
    {
        $statement = $this->dbConnector->prepare("SELECT * FROM carts");
        $statement->bindValue(':query', '%' . $query . '%');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function connect()
    {

        try {
            $this->dbConnector = new PDO('mysql:host=' . $this->mysql_host . ';dbname=' . $this->mysql_dbname, $this->mysql_user, $this->mysql_pwd);
            return $this->dbConnector != null;
        } catch (PDOException $e) {
            echo "Error connecting to database " . $e;
            return false;
        }
    }
}
