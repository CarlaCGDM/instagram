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
            <x-instagram-post user_id="{{ $image->user->id }}" image_id="{{ $image->id }}"
                avatar="{{ $image->user->avatar }}" nick="{{ $image->user->nick }}"
                created_at="{{ $image->created_at }}" image_path="{{ $image->image_path }}"
                description="{{ $image->description }}" likes="{{ $image->likes_count }}"
                liked_by_user="{{ $image->liked_by_user }}" />
            @endforeach
        </div>
        <!-- instagram post grid end-->

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