<?php

class ManageImage
{
  public static function FilterImage($data)
  {
      $image = $data;
      $ext = array('image/jpg', 'image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png');
      $tipe = $image['type'];
      $size = $image['size'];

      if (!in_array(($tipe), $ext)) {
        return false;
      } else if ($size > 2097152) {
        return false;
      } else {

        $extractFile = pathinfo($image['name']);
        $newImageName = uniqid() . "." . $extractFile["extension"];

        return $newImageName;
      }
  }

  public static function SaveImageTo($tmp_name, $name_and_extension)
  {
    $dir = "../public/images/dynamic/";
    
    return move_uploaded_file($tmp_name, $dir . $name_and_extension);
  }
  
  public static function DeleteImageFrom($pathFolder, $name_and_extension) {
    $dir = "../public/images/dynamic/";

    if(file_exists("$dir$pathFolder$name_and_extension")) return unlink($dir . $pathFolder . $name_and_extension);
  }

}
