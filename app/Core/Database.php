<?php

class Database 
{
    private function connect()
    {
        $dsn = DBDRIVER.":hostname=".HOST.";dbname=".DBNAME;
        $connection = new PDO($dsn, USER, PASSWORD);
        return $connection;
    }

    public function query($query, $data = [])
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


}