<x-app-layout>
    <div class="relative max-w-2x1 mx-auto my-3">
    <!--user profile header -->
        <x-user-profile-header 
        avatar="{{ $user->avatar }}"
        nick="{{ $user->nick }}" />
    <!--user profile header end -->

    <!--instagram post grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-0.5 mt-2">
            @foreach($images as $image)
            <x-instagram-post
                image_id="{{ $image->id }}"
                user_id="{{ $image->user->id }}"
                avatar="{{ $image->user->avatar }}"
                nick="{{ $image->user->nick }}"
                created_at="{{ $image->created_at }}"
                image_path="{{ $image->image_path }}"
                description="{{ $image->description }}"
                likes="{{ $image->likes_count }}"
                comments="{{ $image->comments }}"
                liked_by_user="{{$image->liked_by_user}}" />
            @endforeach
        </div>
    <!--instagram post grid end -->

    </div>

    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".like-button").click(function(e) {

        e.preventDefault();

        let user_id = $(this).data("user-id");
        let image_id = $(this).data("image-id");
        let like_count = document.getElementById("like-count-" + image_id);
        let unlike_button = document.getElementById("unlike-button-" + image_id);
        let like_button = document.getElementById("like-button-" + image_id);
        console.log(unlike_button);

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
        console.log(like_count);

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