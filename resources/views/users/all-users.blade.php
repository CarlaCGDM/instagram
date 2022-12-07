<x-app-layout>

    <x-search-bar />

    <!-- instagram post grid -->
    <div class="relative max-w-2x1 mx-auto my-3">
        <div class="grid grid-cols-1 gap-0.5 mt-2 p4">
            @foreach($users as $user)
            <x-user-summary
                user_id="{{ $user->id }}"
                avatar="{{ $user->avatar }}"
                nick="{{ $user->nick }}"
                name="{{ $user->name }}"
                surname="{{ $user->surname }}"
                created_at="{{ $user->created_at }}"  />
            @endforeach
        </div>
        <!-- instagram post grid end-->

    </div>

</x-app-layout>