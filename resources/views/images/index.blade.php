<x-app-layout>
    <!-- component -->
    <div class="relative max-w-2x1 mx-auto my-3">
        <div class="grid grid-cols-5 gap-0.5 mt-2">
            @foreach($images as $image)
            <div class="bg-gray-100 p-4">
                <div class="bg-white border rounded-sm max-w-md">
                    <div class="flex items-center px-4 py-3">
                        <img class="h-8 w-8 rounded-full" src="{{ $image->user->avatar }}" />
                        <div class="ml-3 ">
                            <span class="text-sm font-semibold antialiased block leading-tight">{{ $image->user->nick }}</span>
                            <span class="text-gray-600 text-xs block">{{ $image->created_at }}</span>
                        </div>
                    </div>
                    <img style="aspect-ratio: 1/1" src="{{ $image->image_path }}" />
                    <p style="padding:10px;" class="text-sm">{{ $image->description }}</p>
                    <div class="flex items-center justify-between mx-4 mt-2 mb-2">
                        <div class="flex gap-5">
                            <svg fill="#262626" height="24" viewBox="0 0 48 48" width="24">
                                <path
                                    d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z">
                                </path>
                            </svg>
                            <svg fill="#262626" height="24" viewBox="0 0 48 48" width="24">
                                <path clip-rule="evenodd"
                                    d="M47.5 46.1l-2.8-11c1.8-3.3 2.8-7.1 2.8-11.1C47.5 11 37 .5 24 .5S.5 11 .5 24 11 47.5 24 47.5c4 0 7.8-1 11.1-2.8l11 2.8c.8.2 1.6-.6 1.4-1.4zm-3-22.1c0 4-1 7-2.6 10-.2.4-.3.9-.2 1.4l2.1 8.4-8.3-2.1c-.5-.1-1-.1-1.4.2-1.8 1-5.2 2.6-10 2.6-11.4 0-20.6-9.2-20.6-20.5S12.7 3.5 24 3.5 44.5 12.7 44.5 24z"
                                    fill-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="flex">
                            <div class="font-semibold text-xs mt-2 mb-2">92,372 likes</div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- bottom navigation -->
        <div class="sticky bottom-0 left-0 bg-white w-full py-2 px-3 mt-1 text-xs">
            <div class="flex justify-center items-center">
                <div class="flex flex-col items-center">
                    <button class="bg-black text-white px-5 py-2 rounded-md border border-pink-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- bottom navigation end -->
    </div>
</x-app-layout>