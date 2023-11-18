<?php


class Model extends Database
{
    protected $limit = 10;
    protected $offset = 0;
    protected $column = 'id';
    protected $order = 'ASC';
    protected $table = '';
    protected $allowedColumns = [];

    public function all()
    {
        $query = "select * from $this->table
         order by $this->column $this->order
         limit $this->limit offset $this->offset ";
        return $this->query($query);
    }
    public function read($data, $dataNot = [])
    {
        $keys = array_keys($data);
        $keysNot = array_keys($dataNot);
        $query = "select * from $this->table where ";
        foreach ($keys as $key) {
            $query .= $key . ' = :' . $key . " && ";
        }
        foreach ($keysNot as $key) {
            $query .= $key . ' != :' . $key . " && ";
        }
        $query = rtrim($query, " && ");
        $query .= " limit $this->limit offset $this->offset";
        $data = array_merge($data, $dataNot);
        return $this->query($query, $data);
    }

    public function first($data, $dataNot = [])
    {
        $keys = array_keys($data);
        $keysNot = array_keys($dataNot);
        $query = "select * from $this->table where ";
        foreach ($keys as $key) {
            $query .= $key . ' = :' . $key . " && ";
        }
        foreach ($keysNot as $key) {
            $query .= $key . ' != :' . $key . " && ";
        }
        $query = rtrim($query, " && ");
        $query .= " limit $this->limit offset $this->offset";
        $data = array_merge($data, $dataNot);
        $result = $this->query($query, $data);
        if ($result) {
            return $result[0];
        }
        return false;
    }

    public function insert($data)
    {
        #REMOVE UNWANTED DATA
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);
        $query = "insert into $this->table (" . implode(',', $keys) . ") values (:" . implode(',:', $keys) . ")";
        $this->query($query, $data);
        return false;
    }

    public function update($id, $data, $idColumn = 'id')
    {
        #REMOVE UNWANTED DATA
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);
        $query = "update  $this->table set ";
        foreach ($keys as $key) {
            $query .= $key . ' = :' . $key . ", ";
        }

        $query = rtrim($query, ", ");
        $query .= " where $idColumn = :$idColumn";
        $data[$idColumn] = $id;
        $this->query($query, $data);
        return false;
    }

    public function delete($id, $idColumn = 'id')
    {
        $data[$idColumn] = $id;
        $query = "delete from $this->table where $idColumn = :$idColumn";
        $this->query($query, $data);
        return false;
    }
}
