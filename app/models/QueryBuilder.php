<?php

namespace App\models;
use Aura\SqlQuery\QueryFactory;
use PDO;
class QueryBuilder
{
    
     private $pdo;
     private $queryFactory;

    public function __construct()
    {
        global $config;
        $this->pdo = Connection::make( $config['database']);
        $this->queryFactory = new QueryFactory('mysql');
    }
    
    public function all($table)
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
                ->from($table);
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        return $sth->fetchAll(PDO::FETCH_ASSOC);

    }

    //add one note
    public function store($table, $data)
    {
        if($data['title'] == '' || $data['content'] == '')
        {
            flash()->error('Заполните поля');
            header('Location: /add');
            exit;
        }
        $insert = $this->queryFactory->newInsert();
        $insert->into($table)
                ->cols($data);

        $sth = $this->pdo->prepare($insert->getStatement());

        // execute with bound values
        $sth->execute($insert->getBindValues());
    }

    //show one note
    public function show($table, $id)
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(['*'])
            ->from($table)
            ->where('id=:id')
            ->bindValue('id', $id);

        $sth = $this->pdo->prepare($select->getStatement());

             $sth->execute($select->getBindValues());
             return $sth->fetch(2);

    }

    //update one note
    public function update($table,$data, $id)
    {

        $update = $this->queryFactory->newUpdate();

        $update
            ->table($table)                  // update this table
            ->cols($data)   // raw value as "(ts) VALUES (NOW())"
            ->where('id = :id')           // AND WHERE these conditions
            ->bindValue('id', $id);   // bind one value to a placeholder

        $sth = $this->pdo->prepare($update->getStatement());
        $sth->execute($update->getBindValues());
    }


    //delete selected note
    public function delete($table, $id)
    {
        $delete = $this->queryFactory->newDelete();
        $delete->from($table)
                ->where('id=:id')
                ->bindValue('id', $id);
        $sth = $this->pdo->prepare($delete->getStatement());
        $res = $sth->execute($delete->getBindValues());
    }
}