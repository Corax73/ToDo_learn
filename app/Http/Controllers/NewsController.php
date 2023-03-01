<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Faker\Generator as Faker;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('news.index', ['news' => News::all() -> sortByDesc('updated_at')]);
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
        $validatedData = $request -> validate( [
            'name' => 'required|unique:news|max:255',
            'body' => 'required',
            'image' => 'required'
        ], 
        [
            'name.unique' => 'Name is not unique',
            'name.required' => 'Name is required',
            'body.required' => 'Body is required',
            'image.required' => 'Image is required'
        ]
    );
        $filename = image_load_and_mini ($validatedData, $faker);

        $validatedData['image'] = $filename;
        News::create($validatedData);

        return redirect() -> route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $news = News::find($request -> id);
        
        return view('news.show', ['news' => $news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $news = News::find($request -> id);
        
        return view('news.edit', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faker $faker)
    {
        $news = News::find($request -> id);

        if ($request -> image) {

            $validatedData = $request -> validate( [
                'name' => 'required|unique:news|max:255',
                'body' => 'required',
                'image' => 'required'
            ], 
            [
                'name.unique' => 'Name is not unique',
                'name.required' => 'Name is required',
                'body.required' => 'Body is required',
                'image.required' => 'Image is required'
            ]
        );
            
            $filename = image_update_and_mini ($news, $validatedData, $faker);
            
            $validatedData['image'] = $filename;

        } else {
            
            $validatedData = $request -> validate( [
                'name' => 'required|unique:news|max:255',
                'body' => 'required'
            ], 
            [
                'name.unique' => 'Name is not unique',
                'name.required' => 'Name is required',
                'body.required' => 'Body is required'
            ]
        );
        }

        $news -> update($validatedData);
        
        return view('news.show', ['news' => $news]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'delete':
                $NewsId = News::find($id);
                $filenameForDel = $NewsId->image;
                Storage::delete('/public/' . $filenameForDel);
                Storage::delete('/public/mini/' . 'mini' . $filenameForDel);
                $NewsId -> delete();
                break;
            case 'download':
                $NewsId = News::find($id);
                $filenameForDown = $NewsId -> image;
                return Storage::download('/public/' . $filenameForDown);
                break;
        }

        return redirect('/news');
    }
}
