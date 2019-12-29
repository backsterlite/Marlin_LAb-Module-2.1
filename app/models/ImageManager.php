<?php


namespace App\models;


use Intervention\Image\ImageManagerStatic as Image;

class ImageManager
{
    private $folder;
    public function __construct()
    {
        $this->folder = config('uploadsFolder');
    }

    public function verificationImage( $newImage)
    {
        if(!file_exists($newImage['tmp_name']) || !is_uploaded_file($newImage['tmp_name'])) return false;
        if($newImage['error'] == '0')
        {
            if(in_array(mime_content_type($newImage['tmp_name']), ['image/jpeg','image/png','image/gif']))
            {
                if(filesize($newImage['tmp_name']) < '5242880')
                {
                    return uniqid() .'.'. pathinfo($newImage['name'], PATHINFO_EXTENSION);
                }

                throw  new \Exception('Размер файла превышает допустимые границы');
            }

            throw  new \Exception ('Недопустимое расширение файла');
        }
        throw new \Exception('Произошла ошибка на стороне сервера, попробуйте поаторить попытку позднее');
    }



    public function add( $newImage, $folder, $file,  $currentImage = '1')
    {


            if($this->checkExists($folder, $currentImage)) $this->delete($folder, $currentImage);
            if(is_array($newImage))
            {
                $image = Image::make($newImage['tmp_name']);
            }elseif(is_string($newImage))
            {
                $image = Image::make($newImage);
            }

            $image->save( dirname(dirname(__DIR__)) . $this->folder[$folder][0].$file);
            return true;

    }

    public function checkExists($folder, $file = '1')
    {
        if($folder == 'user')
        {
            if($file == '')
            {
                $file = '1';
                if(file_exists(dirname(dirname(__DIR__)) . $this->folder[$folder][0].$file))
                {
                    return true;
                }
            }else{
                if(file_exists(dirname(dirname(__DIR__)) . $this->folder[$folder][0].$file))
                {
                    return true;
                }
            }

            return false;
        }elseif($folder == 'post')
        {
            if($file == '')
            {
                $file = '1';
                if(file_exists(dirname(dirname(__DIR__)) . $this->folder[$folder][0].$file))
                {
                    return true;
                }
            }else
            {
                if(file_exists(dirname(dirname(__DIR__)) . $this->folder[$folder][0].$file))
                {
                    return true;
                }
            }

             return false;
        }
        return null;
    }

    public function delete($folder, $file = '1')
    {
        if($this->checkExists($folder, $file))
        {
            unlink(dirname(dirname(__DIR__)) . $this->folder[$folder][0].$file);
        }
           return null;

    }

    public function getImage($folder, $file)
    {

        if($folder == 'user')
        {
            if($this->checkExists($folder, $file))
            {

                return $this->folder[$folder][0] . $file;
            }
                return  $this->folder[$folder][1];
        }elseif($folder == 'post')
        {
            if($this->checkExists($folder, $file))
            {
                return $this->folder[$folder][0].$file;
            }
                return $this->folder[$folder][1];
        }
        return null;
    }

}