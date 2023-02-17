<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('news.index',['news' => News::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Faker $faker)
    {
        $data = $request->all();

        $filename = $data['image']->getClientOriginalName();
        $uniquePrefix = $faker->swiftBicNumber;
        $uniqueFilename = $uniquePrefix . $filename;
        $filename = $uniqueFilename;

        
        $data['image']->move(Storage::path('/public'), $filename);

        
        $resizeImg = Image::make(Storage::path('/public/') . $uniqueFilename);
        $resizeImg->fit(300, 300, function($img) {
            $img->aspectRatio();
            $img->upsize();
        })->blur(50);;
        
        $resizeImg->save(Storage::path('/public/mini/') . 'mini' . $uniqueFilename);

        
        $data['image'] = $filename;
        News::create($data);

        return redirect()->route('news');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $NewsId = News::find($id);
        $NewsId->delete();

        return redirect('/news');
    }
}
