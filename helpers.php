<?php

function dd ($item, $key = 1)
{
    echo '<pre>';
    var_dump($item);
    echo '</pre>';
    if($key == 1)
    {
        die;
    }
}