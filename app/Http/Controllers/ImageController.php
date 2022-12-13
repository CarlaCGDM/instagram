<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use App\Models\Like;
use App\Models\Comment;
use App\Http\Controllers\LikeController;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;
use App\Providers\RouteServiceProvider;

class ImageController extends Controller
{
    /**
    * Muestra un listado de todas las imágenes subidas por todos los usuarios.
    * No se ven los comentarios asociados a la imagen, pero sí la información referente al usuario que la ha subido.
    *
    * @return Renderable
    */
    public function index(Request $request = null): Renderable
    {
        $images = Image::with("user")->withCount("likes", "comments")->withCount("comments")->addSelect(['liked_by_user' => Like::select('id')
        ->where('user_id', auth()->id())
        ->whereColumn('image_id', 'images.id')])->latest()->paginate();

        //dd($images);

        return view("images.index", compact("images"));
    }


    /**
    * Muestra un listado de todas las imágenes subidas por un usuario en particular.
    * No se ven los comentarios asociados a la imagen, pero sí la información referente al usuario que la ha subido.
    *
    * @return Renderable
    */
    public function user_index(Request $request): Renderable
    {
        $images = Image::with("user")->withCount("likes", "comments")->where("user_id", $request->user_id)->addSelect(['liked_by_user' => Like::select('id')
        ->where('user_id', auth()->id())
        ->whereColumn('image_id', 'images.id')])->latest()->paginate();
        $user = User::where("id", $request->user_id)->first();
        return view("images.user-index", compact("user","images"));
    }

    public function image_detail(Request $request): Renderable
    {
        $image = Image::where("id", $request->image_id)->with("user")->withCount("likes", "comments")->addSelect(['liked_by_user' => Like::select('id')
        ->where('user_id', auth()->id())
        ->whereColumn('image_id', 'images.id')])->first();

        $comments = Comment::with("user")->where("image_id", $request->image_id)->latest()->paginate();

        // dd($image);

        return view("images.image-detail", compact("image","comments"));
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
        $path = $request->file('image')->storePublicly('user_images');
        Image::create([
            'user_id' => $request->user_id,
            'image_path' => $path,
            'description' => $request->description,
            'created_at' => now(),
        ]);

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * 
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        
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
    public function destroy($image_id)
    {
        //comprobar que sea el usuario autenticado, si no lo es, redirigir al login
        $image = Image::where('id', $image_id)->first();
        $image->delete();

        //no devolver a home sino a la pagina de donde vienes, para poder borrar desde tu perfil tambien
        return redirect()->back();
    }
}
