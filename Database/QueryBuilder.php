<?php

class QueryBuilder
{
    
     private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    
    public function all($table)
    {
        $sql = " SELECT * FROM {$table}";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //add one note
    public function store($table, $data)
    {
        $arg = implode(", ", array_keys($data));
        $strmark = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO {$table} ({$arg}) VALUES ({$strmark})";

        $statement = $this->pdo->prepare($sql);
        $result = $statement->execute($data); //true || false
    }

    //show one note
    public function show($table, $id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $table WHERE id=:id");
        $statement->bindParam(":id", $id );
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    //update one note
    public function update($table,$data)
    {
        $stat = '';
        foreach($data as $key => $value)
        {
            $stat .=  $key . "=:" . $key . ",";

        }
        $res = str_ireplace("id=:id,", "", $stat);

        $result = rtrim($res, ",");
        $sql = "UPDATE $table SET $result WHERE id=:id";
        $statement = $this->pdo->prepare($sql);


        $statement->execute($data); // true || false

    }

    //output of one note for change
    public function edit($table, $id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $table WHERE id=:id");
        $statement->bindParam(":id", $id );
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    //delete selected note
    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }
}