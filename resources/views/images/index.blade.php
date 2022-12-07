<x-app-layout>

    @if("a"==null)
    <!--user profile header -->
    <x-user-profile-header />
    <!--user profile header end -->
    @endif

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
                likes="{{ $image->likes_count }}" />
            @endforeach
        </div>
        <!-- instagram post grid end-->

        <!-- bottom navigation -->
        <x-bottom-navigation />
        <!-- bottom navigation end -->
    </div>
    
    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".submit-button").click(function(e) {

        e.preventDefault();

        let user_id = $(this).data("user-id");
        let image_id = $(this).data("image-id");
        let like_count = document.getElementById("like_count_" + image_id);
        console.log(like_count);

        $.ajax({
            type: 'POST',
            url: "{{ route('like.store') }}",
            data: {
                user_id: user_id,
                image_id: image_id,
            },
            success: function(data) {
                console.log(image_id);
                like_count.textContent = parseInt(like_count.textContent) + 1;
            }
        });

    });
    </script>

</x-app-layout>