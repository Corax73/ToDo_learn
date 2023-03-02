<?php

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Faker\Generator as Faker;
use App\Models\News;

if (! function_exists('image_update_and_mini')) {

    /**
     * @param  \App\Models\News  $news
     * @var $validatedData
     * @param Faker\Generator $faker
     * @return var unique name img $filename
     */

    function image_update_and_mini (News $news, $validatedData, Faker $faker) {
        
        $filenameForDel = $news -> image;
        Storage::delete('/public/' . $filenameForDel);
        Storage::delete('/public/mini/' . 'mini' . $filenameForDel);
        
        $filename = $validatedData['image'] -> getClientOriginalName();
        $uniquePrefix = $faker -> swiftBicNumber;
        $uniqueFilename = $uniquePrefix . $filename;
        $filename = $uniqueFilename;
        $validatedData['image'] -> move(Storage::path('/public'), $filename);
        
        $resizeImg = Image::make(Storage::path('/public/') . $filename);
        $resizeImg -> fit(300, 300, function($img) {
            $img -> aspectRatio();
            $img -> upsize();
        }) -> blur(50);
        
        $resizeImg->save(Storage::path('/public/mini/') . 'mini' . $filename);

        return $filename;
    }
}