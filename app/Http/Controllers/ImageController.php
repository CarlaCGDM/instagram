<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use App\Models\Like;
use App\Http\Controllers\LikeController;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;

class ImageController extends Controller
{
    /**
    * Display a listing of all the images.
    *
    * @return Renderable
    */
    public function index(Request $request = null): Renderable
    {
        $images = Image::with("user")->withCount("likes")->latest()->paginate();
        return view("images.index", compact("images"));

        //array = [i1, i2, i3, i4...]
        //array = [(i1,true),(i2,false)]
    }


    /**
    * Display a listing of all the images.
    *
    * @return Renderable
    */
    public function user_index(Request $request): Renderable
    {
        $images = Image::with("user")->withCount("likes")->where("user_id", $request->user_id)->latest()->paginate();
        $user = User::where("id", $request->user_id)->first();
        return view("images.user-index", compact("user","images"));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
