@props([
'nick'=>'text',
'created_at'=>'text',
'image_path'=>'text',
'likes'=>'0',
'description'=>'text',
'avatar'=>'text',
'image_id'=>'text',
'user_id'=>'text',
'liked_by_user'=>'text',
])

<!-- component -->
<div class="bg-gray-100 p-4">
    <div class="bg-white border rounded-sm max-w-md">
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
        <!--formulario del header end-->
        <img style="aspect-ratio: 1/1" src="{{ $image_path }}" />
        <p style="padding:10px;" class="text-sm">{{ $description }}</p>
        <div class="flex items-center justify-between mx-4 mt-2 mb-2">
            <div class="flex gap-5">
                <!--formulario del like-->

                    <button
                    style="{{$liked_by_user==null ? 'display:inline-block;' : 'display:none;'}}"
                    id="like-button-{{ $image_id }}" 
                    class="like-button" 
                    data-user-id="{{ auth()->id() }}" 
                    data-image-id="{{ $image_id }}">
                        <svg fill="#262626" height="24" viewBox="0 0 48 48" width="24">
                            <path
                                d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z">
                            </path>
                        </svg>
                    </button>

                    <button 
                    style="{{$liked_by_user!=null ? 'display:inline-block;' : 'display:none;'}}"
                    id="unlike-button-{{ $image_id }}" 
                    class="unlike-button" 
                    data-user-id="{{ auth()->id() }}"
                    data-image-id="{{ $image_id }}">
                        <svg fill="#ff1a1a" height="24" viewBox="0 0 48 48" width="24">
                            <path
                                d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z">
                            </path>
                        </svg>
                    </button>


                <!--formulario del like end-->
                <!--formulario del comentario-->
                <svg fill="#262626" height="24" viewBox="0 0 48 48" width="24">
                    <path clip-rule="evenodd"
                        d="M47.5 46.1l-2.8-11c1.8-3.3 2.8-7.1 2.8-11.1C47.5 11 37 .5 24 .5S.5 11 .5 24 11 47.5 24 47.5c4 0 7.8-1 11.1-2.8l11 2.8c.8.2 1.6-.6 1.4-1.4zm-3-22.1c0 4-1 7-2.6 10-.2.4-.3.9-.2 1.4l2.1 8.4-8.3-2.1c-.5-.1-1-.1-1.4.2-1.8 1-5.2 2.6-10 2.6-11.4 0-20.6-9.2-20.6-20.5S12.7 3.5 24 3.5 44.5 12.7 44.5 24z"
                        fill-rule="evenodd"></path>
                </svg>
                <!--formulario del comentario end-->
            </div>
            <!--recuento de likes-->
            <div class="flex">
                <div id="like-count-{{ $image_id }}" class="font-semibold text-xs mt-2 mb-2">{{ $likes }} likes</div>
            </div>
            <!--recuento de likes end-->
        </div>
    </div>
</div>
