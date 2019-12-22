<?php


namespace App\models;


use Aura\SqlQuery\QueryFactory;
use PDO;

class Database
{

    private $factory;
    private $pdo;

    public function __construct(QueryFactory $factory, PDO $pdo)
    {
        $this->factory = $factory;
        $this->pdo = $pdo;
    }

    public function allASC($table, $limit = null)
    {
        $select = $this->factory->newSelect();

        $select->cols(['*'])
                ->from($table)
                ->orderBy(['id ASC'])
                ->limit($limit);

        // prepare the statment
        $sth = $this->pdo->prepare($select->getStatement());

        // bind the values and execute
        $sth->execute($select->getBindValues());

        // get the results back as an associative array
        return $sth->fetchAll(PDO::FETCH_ASSOC);

    }

    public function allDESC($table, $order = 'id', $limit = null)
    {
        $select = $this->factory->newSelect();

        $select->cols(['*'])
            ->from($table)
            ->orderBy([$order . ' '. 'DESC'])
            ->limit($limit);

        // prepare the statment
        $sth = $this->pdo->prepare($select->getStatement());

        // bind the values and execute
        $sth->execute($select->getBindValues());

        // get the results back as an associative array
        return $sth->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getFields($table, $value, $field = 'id', $limit = null)
    {
        $select = $this->factory->newSelect();

        $select->cols(['*'])
            ->from($table)
            ->where("$field = :$field")
            ->bindValue(":$field", $value)
            ->orderBy(['id DESC'])//
            ->limit($limit);
        $sth = $this->pdo->prepare($select->getStatement());
        // bind the values and execute
        $sth->execute($select->getBindValues());

        // get the results back as an associative array

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($table, $field, $value)
    {
        $select = $this->factory->newSelect();

        $select->cols(['*'])
            ->from($table)
            ->where($field . ' = :value')
            ->bindValue(':value', $value);
        $sth = $this->pdo->prepare($select->getStatement());
        // bind the values and execute
        $sth->execute($select->getBindValues());

        // get the results back as an associative array

        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    public function getPaginatedFrom($table,$row, $id, $page = 1, $rows = 1)
    {
        $select = $this->factory->newSelect();
        $select->cols(['*'])
            ->from($table)
            ->where("$row = :$row")
            ->bindValue(":$row", (int)$id)
            ->page($page)
            ->setPaging($rows)
            ->orderBy(['id DESC']);
        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPaginated($table, $page = 1, $rows = 1)
    {
        $select = $this->factory->newSelect();
        $select->cols(['*'])
            ->from($table)
            ->page($page)
            ->setPaging($rows);
        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCount($table, $row, $value)
    {
        $select = $this->factory->newSelect();
        $select->cols(['*'])
            ->from($table)
            ->where("$row = :$row")
            ->bindValue(":$row", $value);

        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
         $res = count($sth->fetchAll(PDO::FETCH_ASSOC));
        return $res;
    }
    public function whereAll($table, $row, $value)
    {
        $select = $this->factory->newSelect();

        $select->cols(['*'])
            ->from($table)
            ->where("$row = :$row")
            ->bindValue(":$row", $value);

        $sth = $this->pdo->prepare( $select->getStatement());

        $sth->execute($select->getBindValues());
       return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllPostsWithTags($table, $row, $values)
    {
        $select = $this->factory->newSelect();

            $select->cols(['*'])
                ->from($table)
                ->orderBy(['id DESC']);
                foreach ($values as $value)
                {
                    $select->where("$row = :$row")
                        ->bindValue(":$row", $value['post_id']);
                }
        $sth = $this->pdo->prepare("CREATE OR REPLACE VIEW postsT AS " . $select->getStatement());

        $sth->execute($select->getBindValues());
    }
    public function update($table, $data, $row, $value)
    {
        $update = $this->factory->newUpdate();

        $update
            ->table($table)                  // update this table
            ->cols($data)
            ->where("$row = :$row")           // AND WHERE these conditions
            ->bindValue(":$row", $value);

        $sth = $this->pdo->prepare($update->getStatement());

        // execute with bound values
        return $sth->execute($update->getBindValues());
    }
}