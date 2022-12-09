<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Image;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Listado de todas las imagenes que un usuario ha marcado como favoritas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::whereHas('likes', function($likes) {
            $likes->where('user_id',Auth()->id());
        })
        ->withCount("likes")
        ->addSelect(['liked_by_user' => Like::select('id')->where('user_id', auth()->id())->whereColumn('image_id', 'images.id')])
        ->latest()
        ->paginate();

        // dd($images);

        return view("likes.faved", compact("images"));
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
    public function store(Request $request)
    {
        Like::create([
            'user_id' => $request->user_id,
            'image_id' => $request->image_id,
            'created_at' => now(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $like = Like::where('user_id', $request->user_id)->where('image_id', $request->image_id)->first();
        $like->delete();
    }
}