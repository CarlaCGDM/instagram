<x-app-layout>

<!--grid-->
<section class="flex justify-center" mt-2>

<div>
    <div>
    @foreach($comments as $comment)

    <x-comment
        nick="{{ $comment->user->nick }}"
        avatar="{{ $comment->user->avatar }}"
        created_at="{{ $comment->created_at }}"
        user_id="{{ $comment->user->id }}"
        comment_id="{{ $comment->id}}"
        content="{{ $comment->content }}"
    />
    @endforeach
    </div>
    <form method="POST" action="{{ route('comments.store') }}" style="display:flex; flex-direction:column;  align-items:center;" class="mt-4">
        @csrf
        <label for="description" style="width:100%; text-align:left;">Nuevo comentario:</label>
        <textarea style="color:black; width: 100%" id="story" name="description" rows="5" placeholder="Di algo bonito :)" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </form>
</div>

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

</section>
<!--grid end-->

</x-app-layout>