<?php


namespace App\models;


class Post
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getOnePostFromCategories($table1, $table2)
    {
        $categories = $this->database->allASC($table2);
        $posts = $this->database->allDESC($table1);
        $find = [];
        foreach ( $categories as $category) {
            foreach ($posts as $post) {
                if($category['id'] == $post['category_id'])
                {
                    $find[] = $post;
                    continue 2;
                }
            }
        }
        return $find;
    }
}