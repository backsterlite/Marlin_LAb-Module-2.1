<?php

use Aura\SqlQuery\QueryFactory;

class QueryBuilder
{
    
     private $pdo;
     private $queryFactory;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
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
        return $sth->fetch(PDO::FETCH_ASSOC);
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

    //output of one note for change
    public function edit($table, $id)
    {
        $this->show($table, $id);
    }

    //delete selected note
    public function delete($table, $id)
    {
        $delete = $this->queryFactory->newDelete();
        $delete->from($table)
                ->where('id=:id')
                ->bindValue('id', $id);
        $sth = $this->pdo->prepare($delete->getStatement());
        $sth->execute($delete->getBindValues());
    }
}