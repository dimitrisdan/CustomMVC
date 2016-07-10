<?php

class Database{
    
    private $_dbuser;
    private $_dbpass;
    private $_dbname;

    private $stmt;
    
    private $dbh;
    private $error;
 

    public function connect($dbhost,$dbuser,$dbpass,$dbname){
        
        $this->_dbname = $dbname;
        $this->_dbuser = $dbuser;
        $this->_dbpass = $dbpass;

        // Set DSN
        $dsn = 'mysql:host='. $dbhost .';dbname=' . $this->_dbname;
        // Set options
        $options = array(
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
        );

        try{
            $this->dbh = new PDO($dsn, $this->_dbuser, $this->_dbpass, $options);
            return 1;
        } // Catch any errors
        catch(PDOException $e){
            $this->error = $e->getMessage();
            return 0;
        }
    }
    
    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }
    
    public function bind($param, $value, $type = null){
        
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    
    public function execute(){
        return $this->stmt->execute();
    }
    public function getConnection(){
        return $this->dbh;
    }
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function rowCount(){
        return $this->stmt->rowCount();
    }
    
    public function lastInsertId(){
        return $this->dbh->lastInsertId();
    }
    public function disconnect(){
        $this->dbh = null;
    }
}