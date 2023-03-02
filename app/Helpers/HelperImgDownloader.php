<?php

use App\Models\News;
use Illuminate\Support\Facades\Storage;

if (! function_exists('image_download')) {

    /**
     * @param  \App\Models\News  $news
     */

    function image_download (News $news) {

        $filenameForDown = $news -> image;

        return Storage::download('/public/' . $filenameForDown);

    }
}
