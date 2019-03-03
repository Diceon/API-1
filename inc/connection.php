<?php

class connection {

    private $pdo;

    public function __construct($hostname, $dbname, $username, $password) {
        $pdo = new PDO('mysql:host=' . $hostname . ';dbname=' . $dbname . ';charset=utf8', $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
    }

    public function query($query, $params = array()) {
        $statement = $this->pdo->prepare($query);
        $statement->execute($params);
        if (explode(' ', $query)[0] == 'SELECT') {
            $data = $statement->fetchAll();
            return $data;
        }
    }
    
    public function insert($query, $params = array()) {
        $statement = $this->pdo->prepare($query);
        $statement->execute($params);
        if ($statement) {
            return true;
        } else {
            printf("PDO ERROR: %s\n", $this->pdo->errorInfo());
            exit();
        }
    }

}

?>