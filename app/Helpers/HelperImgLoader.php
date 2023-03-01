<?php

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Faker\Generator as Faker;

if (! function_exists('image_load_and_mini')) {

    function image_load_and_mini ($validatedData, Faker $faker) {
        
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