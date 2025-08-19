<?php

class Database {
    
    private $connection;

    public function __construct($config, $username = 'root', $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config,'',';');
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    
    // universal query
    public function query($query, $params = [])
    {       
        $statment = $this->connection->prepare($query);
        $statment->execute($params);
        return $statment;
    }
    
    //select query
    public function select($tableName, $columns)
    {
        $sqlcolumns = Validator::sanitize($columns);
        $sql = "SELECT " . $sqlcolumns . " FROM " . $tableName;
        $statment = $this->connection->prepare($sql);
        $statment->execute();
        return $statment;
    }
}