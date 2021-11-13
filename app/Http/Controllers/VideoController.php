<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreVideoRequest;
use App\Models\Video;

class VideoController extends Controller
{
    //
    public function index()
    {

        $videos = Video::all();
        return view('videos.index', compact('videos'));
    }
    public function create()
    {
        return view('videos.create');
    }

    public function store(StoreVideoRequest $request)
    {
        $video = Video::create([
            'title' => $request->title,
            'url' => $request->url
        ]);
        


        return redirect()->route('videos.index')->with('success', 'Votre post a été créé');
    }
}
