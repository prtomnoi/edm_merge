<?php

namespace App\helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\StorageFacade;
// use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use GuzzleHttp\Psr7\Stream;

class Helper
{
    public static function dateThai($date)
    {
        return date('d/m/Y, H:i', strtotime($date));
    }
    // public static function upload_image($image_file,$folder,$x,$y)
    // {
    //     $filename = "$folder" . date('dmY-His');
    //     $file = $image_file;
    //     if ($file)
    //     {
    //         $lg = Image::make($file->getRealPath());
    //         $size = $lg->filesize();
    //         $ext = explode("/", $lg->mime())[1];
    //         $lg->resize($x,$y)->stream();
    //         $newLG = 'uploads/'.$folder.'/' . $filename . '.' . $ext;
    //         $store = Storage::disk('public')->put($newLG, $lg);
    //         if($store)
    //         {
    //             $arr['image'] = $newLG;
    //             $arr['ext'] = $ext;
    //             $arr['size'] = $size;
    //         }else{
    //             $arr['status'] = 500;
    //             $arr['message'] = "Error";
    //         }
    //         return $arr;
    //     }
    // }



    public static function upload_image($image_stream, $folder, $x, $y)
    {
        // $filename = "$folder" . date('dmY') . '-' . uniqid();
        // $arr = []; // Initialize the array

        // $lg = Image::read($image_stream); // Create an Intervention Image instance from the stream
        // $ext = 'jpg'; // Assuming a default extension of 'jpg'
        // $size = $lg->filesize();

        // // Resize the image if width and height are provided
        // if ($x && $y) {
        //     $lg->resize($x, $y);
        // }

        // // Store the resized or original image
        // $newLG = 'backend/uploads/' . $folder . '/' . $filename . '.' . $ext;
        // $store = Storage::disk('public')->put($newLG, (string) $lg->encode());
        // // $store = StorageFacade::disk('public')->put($newLG, (string) $lg->encode());

        // if ($store) {
        //     $arr['image'] = $newLG;
        //     $arr['ext'] = $ext;
        //     $arr['size'] = $size;
        // } else {
        //     $arr['status'] = 500;
        //     $arr['message'] = "Error";
        // }
        // change name image
        $new_nameImage = "$folder" . date('dmY') . '-' . uniqid() . '.' .$image_stream->getClientOriginalExtension();
        // check old image and delete;
        // if (File::exists(public_path($oldImage))) {
        //     File::delete(public_path($oldImage));
        // }
        // path image
        $path = public_path('backend/uploads/' . $folder . '/' . $new_nameImage);
        // read image file
        $manager = Image::read($image_stream);
        // scale image to width 300px height auto
        // $manager->scale(width: 300);
        // save image to path public/upload/...
        if ($manager->save($path)) {
            $arr['image'] = 'uploads/' . $folder  . '/' . $new_nameImage;
            $arr['ext'] = $image_stream->getClientOriginalExtension();
            $arr['size'] = getimagesize($image_stream);
        } else {
            $arr['status'] = 500;
            $arr['message'] = "Error";
        }
        return $arr;
    }
    public static function upload_image_resize($image_stream, $folder, $x, $y)
    {
        $new_nameImage = "$folder" . date('dmY') . '-' . uniqid() . '.' .$image_stream->getClientOriginalExtension();
        // path image
        $path = public_path('backend/uploads/' . $folder . '/' . $new_nameImage);
        // read image file
        $manager = Image::read($image_stream);
        // scale image to width 300px height auto
        $manager->scale(width: $x);
        // save image to path public/upload/...
        if ($manager->save($path)) {
            $arr['image'] = 'uploads/' . $folder  . '/' . $new_nameImage;
            $arr['ext'] = $image_stream->getClientOriginalExtension();
            $arr['size'] = getimagesize($image_stream);
        } else {
            $arr['status'] = 500;
            $arr['message'] = "Error";
        }
        return $arr;
    }
    public static function getYouTubeVideoId($url)
    {
        $query = parse_url($url, PHP_URL_QUERY);
        parse_str($query, $params);
        return $params['v'] ?? null;
    }
}
