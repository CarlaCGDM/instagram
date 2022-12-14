@props([
'nick'=>'text',
'avatar'=>'text',
'created_at'=>'text',
'content'=>'text',
'user_id'=>'text',
'comment_id'=>'text',
'image_id'=>'text'
])

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
            <!--boton de borrar solo se muestra si el usuario autenticado es el autor del comentario [FALTA: o de la imagen]-->
            @if(Auth::user()->id == $user_id or Auth::user()->id == $image_id)
            <form method="post" action="{{ route('comments.destroy', $comment_id) }}">
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
            <!--boton de editar solo si el usuario autenticado es el autor del comentario-->
            @if(Auth::user()->id == $user_id or Auth::user()->id == $image_id)
            <form method="post" action="{{ route('comments.update', $comment_id) }}">
                @method('PUT')
                @csrf
                <div class="mt-4">
                <textarea style="color:black; width: 100%" id="story" name="content" rows="5" value="{{ $content }}" class="bg-white border rounded-sm max-w-md" required></textarea>
                </div>
                <button style="padding:4px;display: inline-flex; align-items: top;">
                    Editar
                </button>
            </form>

            @endif
            <!--boton de editar end-->
        </div>
        <!--formulario del header end-->

        <p style="padding:10px;" class="text-sm">{{ $content }}</p>
    </div>
</div>