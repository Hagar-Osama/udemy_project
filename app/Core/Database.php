<?php

class Database 
{
    private function connect()
    {
        $dsn = DBDRIVER.":hostname=".HOST.";dbname=".DBNAME;
        $connection = new PDO($dsn, USER, PASSWORD);
        return $connection;
    }

    public function query($query, $data = []) //we use prepared statement for sql injection prevention
    {
        $conn = $this->connect();
        $statement = $conn->prepare($query);
        $check = $statement->execute($data);
        if($check) {
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            if(is_array($result) && count($result)) {
                return $result;
            }
        }
        return false;
    }

    public function getRow($query, $data = [])
    {
        $conn = $this->connect();
        $statement = $conn->prepare($query);
        $check = $statement->execute($data);
        if($check) {
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            if(is_array($result) && count($result)) {
                return $result[0];
            }
        }
        return false;
    }

    public function createTable()
    {
        //USERS TABLE
        $query = "CREATE TABLE IF NOT EXISTS `users` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255) NOT NULL,
            `email` varchar(255) NOT NULL,
            `password` varchar(255) NOT NULL,
            `role` varchar(100) DEFAULT 'user',
            `date` date DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `email` (`email`),
            KEY `date` (`date`)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
           	
           $this->query($query);
    }


}