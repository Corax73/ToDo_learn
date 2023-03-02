<?php

use App\Models\News;
use Illuminate\Support\Facades\Storage;

if (! function_exists('image_and_mini_destroy')) {

    /**
     * @param  \App\Models\News  $news
     */

    function image_and_mini_destroy (News $news) {

        $filenameForDel = $news->image;
        Storage::delete('/public/' . $filenameForDel);
        Storage::delete('/public/mini/' . 'mini' . $filenameForDel);
        $news -> delete();

    }
}
