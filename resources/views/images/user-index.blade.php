<x-app-layout>
    <div class="relative max-w-2x1 mx-auto my-3">
    <!--user profile header -->
        <x-user-profile-header 
        avatar="{{ $images[0]->user->avatar }}"
        nick="{{ $images[0]->user->nick }}" />
    <!--user profile header end -->

    <!--instagram post grid -->
        <div class="grid grid-cols-5 gap-0.5 mt-2">
            @foreach($images as $image)
            <x-instagram-post
                image_id="{{ $image->id }}"
                user_id="{{ $image->user->id }}"
                avatar="{{ $image->user->avatar }}"
                nick="{{ $image->user->nick }}"
                created_at="{{ $image->created_at }}"
                image_path="{{ $image->image_path }}"
                description="{{ $image->description }}"
                likes="{{ $image->likes_count }}" />
            @endforeach
        </div>
    <!--instagram post grid end -->

        <!-- bottom navigation -->
        <x-bottom-navigation />
        <!-- bottom navigation end -->
    </div>
</x-app-layout>