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
    public function findWhereAndWhere($table, $field1, $value1, $field2, $value2)
    {
        $select = $this->factory->newSelect();

        $select->cols(['*'])
            ->from($table)
            ->where("$field1=:$field1")
            ->where("$field2=:$field2")
            ->bindValue(":$field1", $value1)
            ->bindValue(":$field2", $value2);
        $sth = $this->pdo->prepare($select->getStatement());
        // bind the values and execute
        $sth->execute($select->getBindValues());

        // get the results back as an associative array

        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    public function find($table, $field, $value )
    {
        $select = $this->factory->newSelect();

        $select->cols(['*'])
            ->from($table)
            ->where("$field=:$field")
            ->bindValue(":$field", $value);
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
            ->bindValue(":$row", $id)
            ->page($page)
            ->setPaging($rows)
            ->orderBy(['id DESC']);
        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPaginated($table,$row, $page = 1, $rows = 1)
    {
        $select = $this->factory->newSelect();
        $select->cols(['*'])
            ->from($table)
            ->page($page)
            ->setPaging($rows)
            ->orderBy(["$row DESC"]);
        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    public function joinQuery($mainTable, $secondTable, $row, $value, $join)
    {
        $select = $this->factory->newSelect();

        $select->cols([
            'post_id',
            'title',
            'slug',
            'content',
            'user_id',
            'date',
            'image',
            'status',
            'is_featured',
            'views',
            'description'
        ])
            ->from($mainTable)
            ->where("$row = :$row")

            ->bindValue(":$row", $value)
            ->join("$join", "$secondTable AS S", "$mainTable.post_id=S.id " );

        $sth = $this->pdo->prepare( "CREATE OR REPLACE VIEW post_with_tags AS " .  $select->getStatement());

        $sth->execute($select->getBindValues());
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
    public function getAllWith($tableOut, $tableIn, $row, $values)
    {
        $select = $this->factory->newSelect();

            $select->cols(['*'])
                ->from($tableOut)
                ->orderBy(['id DESC'])
                ->where("$row = :$row")
                ->bindValues(["$row" => $values]);

        $sth = $this->pdo->prepare("CREATE OR REPLACE VIEW $tableIn AS " . $select->getStatement());

        $sth->execute($select->getBindValues());

    }
    public  function store($table, $data)
    {
        $insert = $this->factory->newInsert();

        $insert
            ->into($table)                   // INTO this table
            ->cols($data);

        // prepare the statement
        $sth = $this->pdo->prepare($insert->getStatement());

        // execute with bound values
        $sth->execute($insert->getBindValues());
        // get the last insert ID
        $name = $insert->getLastInsertIdName('id');
        return $this->pdo->lastInsertId($name);
    }
    public function multiStore($table, $data)
    {
        $insert = $this->factory->newInsert();

        $counter = count($data);
        for($i = 0; $i < $counter; $i++)
        {
            // insert into this table
            $insert->into($table)
                    ->cols($data[$i]);

            // set up the second row. the columns here are in a different order
            // than in the first row, but it doesn't matter; the INSERT object
            // keeps track and builds them the same order as the first row.
            $insert->addRow();

        }

        // prepare the statement
        $sth = $this->pdo->prepare($insert->getStatement());

        // execute with bound values
        $sth->execute($insert->getBindValues());

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
        // execute with bound value

        $res = $sth->execute($update->getBindValues());
        return $res;
    }
    public function delete($table, $row, $value)
    {
        $delete = $this->factory->newDelete();

        $delete
            ->from($table)                   // FROM this table
            ->where("$row=:$row")           // AND WHERE these conditions
            ->bindValue(":$row", $value);
        // prepare the statement
        $sth = $this->pdo->prepare($delete->getStatement());

        // execute with bound values
        $sth->execute($delete->getBindValues());
    }
}