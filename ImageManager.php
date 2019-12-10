<?php
namespace App;

use QueryBuilder;
use SplFileInfo;

class ImageManager
{
    public function create()
    {
        $format = (new SplFileInfo($_FILES['image']['name']))->getExtension();
        $avatarName = uniqid();
        move_uploaded_file($_FILES['image']['tmp_name'], dirname(__DIR__) . $avatarName . $format);
        return $path = $avatarName . $format;
    }

    public function delete($current)
    {
        if(file_exists($current))
        {
            unlink(dirname(__DIR__) . $current);
        }else{
            return null;
        }


     }
}