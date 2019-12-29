<?php
error_reporting(-1);
if( !session_id() ) @session_start();

use Faker\Factory;

require dirname(__DIR__) . '/vendor/autoload.php';
require dirname(__DIR__) . '/app/start.php';

/*$db = components(\App\models\Database::class);
$faker = Factory::create();

for($i = 0; $i < 8; $i++)
{
    $data = [
        'title' => $faker->word
    ];
    $db->store('tags', $data);

    $data = [
        'title' => $faker->word
    ];
    $db->store('category', $data);
}*/