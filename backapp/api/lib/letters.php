<?php

class Letters
{
    // Properties
    private $query;
    private $dbConnector;

    // Config
    private $mysql_host;
    private $mysql_user;
    private $mysql_pass;
    private $mysql_base;


    // Constructor
    public function __construct($mysql_host, $mysql_user, $mysql_pass, $mysql_base)
    {
        $this->mysql_host = $mysql_host;
        $this->mysql_user = $mysql_user;
        $this->mysql_pass = $mysql_pass;
        $this->mysql_base = $mysql_base;
    }

    // Méthodes
    public function getLetters($query)
    {
        $statement = $this->dbConnector->prepare("SELECT * FROM letters;");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function connect()
    {

        try {
            $this->dbConnector = new PDO('mysql:host=' . $this->mysql_host . ';dbname=' . $this->mysql_base, $this->mysql_user, $this->mysql_pass);
            return $this->dbConnector != null;
        } catch (PDOException $e) {
            echo "Error connecting to database " . $e;
            return false;
        }
    }
}
