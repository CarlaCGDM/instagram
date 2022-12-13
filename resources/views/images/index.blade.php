<x-app-layout>

    <!-- create new post overlay -->
    <div id="new-post-form" style="visibility:hidden; position:fixed; top:50%; left: 50%; transform:translate(-50%, -50%); z-index: 100;">
        <x-new-instagram-post />
    </div>
    <!-- create new post overlay end -->

    <!-- instagram post grid -->
    <div class="relative max-w-2x1 mx-auto my-3">
        <div class="grid grid-cols-5 gap-0.5 mt-2">
            @foreach($images as $image)
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
                liked_by_user="{{ $image->liked_by_user }}"/>
            @endforeach
        </div>
        <!-- instagram post grid end-->

        <!-- bottom navigation -->
        <div class="sticky bottom-0 left-0 bg-white w-full py-2 px-3 mt-1 text-xs">
            <div class="flex justify-center items-center">
                <div class="flex flex-col items-center">
                    <!--boton de nueva imagen-->
                    <button class="new-post-button bg-black text-white px-5 py-2 rounded border border-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <!--boton de nueva imagen-->
                </div>
            </div>
        </div>
        <!-- bottom navigation end -->
    </div>

    <script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // ver formulario de crear nuevo post

    $(".new-post-button").click(function(e) {

        let form = document.getElementById("new-post-form");
        form.style.visibility = 'visible';

    });

    // like/unlike

    $(".like-button").click(function(e) {

        e.preventDefault();

        let user_id = $(this).data("user-id");
        let image_id = $(this).data("image-id");
        let like_count = document.getElementById("like-count-" + image_id);
        let unlike_button = document.getElementById("unlike-button-" + image_id);
        let like_button = document.getElementById("like-button-" + image_id);

        $.ajax({
            type: 'POST',
            url: "{{ route('like.store') }}",
            data: {
                user_id: user_id,
                image_id: image_id,
            },
            success: function(data) {
                like_count.textContent = `${parseInt(like_count.textContent) + 1} likes`;
                unlike_button.style.display = "inline-block";
                like_button.style.display = "none";

            }
        });

    });

    $(".unlike-button").click(function(e) {

        e.preventDefault();

        let user_id = $(this).data("user-id");
        let image_id = $(this).data("image-id");
        let like_count = document.getElementById("like-count-" + image_id);
        let unlike_button = document.getElementById("unlike-button-" + image_id);
        let like_button = document.getElementById("like-button-" + image_id);

        $.ajax({
            type: 'POST',
            url: "{{ route('like.destroy') }}",
            data: {
                user_id: user_id,
                image_id: image_id,
            },
            success: function(data) {
                like_count.textContent = `${parseInt(like_count.textContent) - 1} likes`;
                like_button.style.display = "inline-block";
                unlike_button.style.display = "none";
            }
        });

    });
    </script>

</x-app-layout>