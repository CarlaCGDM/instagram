@props([
'nick'=>'text',
'created_at'=>'text',
'image_path'=>'text',
'likes'=>'text',
'comments' => 'text',
'description'=>'text',
'avatar'=>'text',
'image_id'=>'text',
'user_id'=>'text',
'liked_by_user'=>'text'
])

<!-- component -->
<div class="bg-gray-100 p-4">
    <div class="bg-white border rounded-sm max-w-md">
        <div style="display:flex;flex-direction:row;justify-content:space-between;">
            <!--formulario del header-->
            <form method="GET" action="{{ route('user-index') }}">
                <input type=hidden name="user_id" value="{{ $user_id }}">
                <div class="flex items-center px-4 py-3">
                    <button type="submit"><img class="h-8 w-8 rounded-full" src="{{ $avatar }}" /></button>
                    <div class="ml-3 ">
                        <button type="submit"><span
                                class="text-sm font-semibold antialiased block leading-tight">{{ $nick }}</span></button>
                        <span class="text-gray-600 text-xs block">{{ $created_at }}</span>
                    </div>
                </div>
            </form>
            <!--boton de borrar solo se muestra si el usuario autenticado es el autor de la publicacion-->
            @if(Auth::user()->id == $user_id)
            <form method="post" action="{{ route('images.destroy', $image_id) }}">
                @method('DELETE')
                @csrf
                <button style="padding:4px;display: inline-flex; align-items: top;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#adadad" viewBox="0 0 16 16">
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg>
                </button>
            </form>
            @endif
        </div>
        <!--formulario del header end-->
        <img style="aspect-ratio: 1/1" src="{{ $image_path }}" class="object-cover" />
        <p style="padding:10px;" class="text-sm">{{ $description }}</p>
        <div class="flex items-center justify-between mx-4 mt-2 mb-2">
            <div class="flex gap-5">
                <!--formulario del like-->

                <button style="{{$liked_by_user==null ? 'display:inline-block;' : 'display:none;'}}"
                    id="like-button-{{ $image_id }}" class="like-button" data-user-id="{{ auth()->id() }}"
                    data-image-id="{{ $image_id }}">
                    <svg fill="#262626" height="24" viewBox="0 0 48 48" width="24">
                        <path
                            d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z">
                        </path>
                    </svg>
                </button>

                <button style="{{$liked_by_user!=null ? 'display:inline-block;' : 'display:none;'}}"
                    id="unlike-button-{{ $image_id }}" class="unlike-button" data-user-id="{{ auth()->id() }}"
                    data-image-id="{{ $image_id }}">
                    <svg fill="#ff1a1a" height="24" viewBox="0 0 48 48" width="24">
                        <path
                            d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z">
                        </path>
                    </svg>
                </button>


                <!--formulario del like end-->
                <!--formulario del comentario-->
                <form method="GET" action="{{ route('image-detail')}}">
                <input type=hidden name="image_id" value="{{ $image_id }}">
                <button type="submit">
                <svg fill="#262626" height="24" viewBox="0 0 48 48" width="24">
                    <path clip-rule="evenodd"
                        d="M47.5 46.1l-2.8-11c1.8-3.3 2.8-7.1 2.8-11.1C47.5 11 37 .5 24 .5S.5 11 .5 24 11 47.5 24 47.5c4 0 7.8-1 11.1-2.8l11 2.8c.8.2 1.6-.6 1.4-1.4zm-3-22.1c0 4-1 7-2.6 10-.2.4-.3.9-.2 1.4l2.1 8.4-8.3-2.1c-.5-.1-1-.1-1.4.2-1.8 1-5.2 2.6-10 2.6-11.4 0-20.6-9.2-20.6-20.5S12.7 3.5 24 3.5 44.5 12.7 44.5 24z"
                        fill-rule="evenodd"></path>
                </svg>
                <button>
                </form>
                <!--formulario del comentario end-->
            </div>
            <!--recuento de likes-->
            <div class="flex" style="flex-direction: row; gap: 10px;">
                <p id="like-count-{{ $image_id }}" class="font-semibold text-xs mt-2 mb-2">{{ $likes }} likes</p>
                <p class="font-semibold text-xs mt-2 mb-2">{{ $comments }} comments</p>
            </div>
            <!--recuento de likes end-->
        </div>
    </div>
</div>