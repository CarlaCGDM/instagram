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
</x-app-layout>