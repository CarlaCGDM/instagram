<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
    * Display a listing of all the images.
    *
    * @return Renderable
    */
    public function index(Request $request): Renderable
    {
    
        //si la busqueda no es null, filtramos
        if ($request == null) {
            $users= User::latest()->paginate();
        } else {
            $users = User::where('nick', 'LIKE', '%'.$request->filter.'%')->orWhere('name', 'LIKE', '%'.$request->filter.'%')->orWhere('surname', 'LIKE', '%'.$request->filter.'%')->latest()->paginate();
        }
        
        //tengo que ponerle un limite por pagina
        return view("users.all-users", compact("users"));
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

        Comment::create([
            'user_id' => $request->user_id,
            'image_id' => $request->image_id,
            'content' => $request->content,
            'created_at' => now(),
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($comment_id)
    {
        $comment = Comment::where('id', $comment_id)->first();
        $comment->delete();

        return redirect()->back();
    }
}
