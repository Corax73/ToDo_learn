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
        
        image_and_mini_destroy($news);

        $filename = image_load_and_mini($validatedData, $faker);

        return $filename;
    }
}