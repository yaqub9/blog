<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ImageUploadController extends Controller
{
    static public function ImageUpload($name, $height, $width,  $path, $file){
        $image_name = $name. '-'. date('d-m-Y').'.webp';
        Image::make($file)
        ->fit( $width, $height )
        ->save(public_path($path).$image_name, '50', 'webp');
        return $image_name;
    }

    static public function ImageUnlink($path, $name){
        $image_path = public_path($path).$name;
        if (file_exists($image_path)){
            unlink($image_path);
        }
    }
}
