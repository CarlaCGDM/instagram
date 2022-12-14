<x-app-layout>

<section class="flex justify-center" mt-2>

<div>
    
    <!--comentarios-->
    <div>
    @foreach($comments as $comment)
    <x-comment
        nick="{{ $comment->user->nick }}"
        avatar="{{ $comment->user->avatar }}"
        created_at="{{ $comment->created_at }}"
        user_id="{{ $comment->user->id }}"
        comment_id="{{ $comment->id}}"
        content="{{ $comment->content }}"
        image_id="{{ $image->id }}"
    />
    @endforeach
    </div>
    <!--comentarios end-->

    
    <!--nuevo comentario-->
    <form method="POST" action="{{ route('comments.store') }}" style="display:flex; flex-direction:column;  align-items:center;" class="mt-4">
        @csrf
        <label for="description" style="width:100%; text-align:left;">Nuevo comentario:</label>
        <input type="hidden" name="image_id" value="{{ $image->id }}">
        <textarea style="color:black; width: 100%" id="story" name="content" rows="5" placeholder="Di algo bonito :)" class="bg-white border rounded-sm max-w-md" required></textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
            <button>Enviar</button>
    </form>
    <!--nuevo comentario end-->

</div>

<!--foto principal-->
<x-instagram-post 
    user_id="{{ $image->user->id }}" 
    image_id="{{ $image->id }}"
    avatar="{{ $image->user->avatar }}" 
    nick="{{ $image->user->nick }}"
    created_at="{{ $image->created_at }}" 
    image_path="{{ $image->image_path }}"
    description="{{ $image->description }}" 
    likes="{{ $image->likes_count }}"
    comments="{{ $image->comments_count }}"
    liked_by_user="{{ $image->liked_by_user }}" 
/> 
<!--foto principal end-->
</section>

</x-app-layout>