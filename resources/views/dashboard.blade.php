<x-app-layout>
    <!-- component -->
<div class="relative max-w-2xl mx-auto my-3">
        <!-- top navbar -->
        <div class="flex justify-between items-center text-sm">
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
            </button>
            <a href="#" class="flex gap-1 items-center">
                <span class="font-bold">Geeky Gamer</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </a>
            <div class="flex gap-2">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
        <!-- top navbar end -->
    
        <!-- top header -->
        <div class="flex flex-col justify-center items-center my-5">
            <div class="w-16 h-16 bg-cover bg-center bg-no-repeat rounded-full" style="background-image: url('https://img.freepik.com/premium-vector/gamer-mascot-geek-boy-esports-logo-avatar-with-headphones-glasses-cartoon-character_8169-228.jpg');"></div>
            <span class="my-3">@_geeeky_gamer</span>

            <div class="flex gap-10 text-sm">
                <div class="flex flex-col items-center">
                    <span class="font-bold">10</span>
                    <span>Following</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="font-bold">1.20 K</span>
                    <span>Followers</span>
                </div>
                <div class="flex flex-col items-center">
                    <span class="font-bold">100 K</span>
                    <span>Likes</span>
                </div>
            </div>

            <button class="my-5 px-5 py-2 font-semibold text-sm border border-gray-400">Edit profile</button>

            <p class="mb-3">Description about me goes here</p>
        </div>
        <!-- top header end -->


        <!-- middle navigation -->
        <div class="grid grid-cols-4">
            <button class="mx-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="border-b-2 border-gray-600 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                </svg>
            </button>
            <button class="mx-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </button>
            <button class="mx-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                </svg>
            </button>
            <button class="mx-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </button>
        </div>
        <!-- middle navigation end -->

        <!-- video grid -->
        <div class="grid grid-cols-2 gap-0.5 mt-2">

            <div>
                <!-- small player with views -->
                <x-instagram-post />
                <!-- small player with views end -->
            </div>

            <div>
                <!-- small player with views -->
                <x-instagram-post />
                <!-- small player with views end -->
            </div>

            <div>
                <!-- small player with views -->
                <x-instagram-post />
                <!-- small player with views end -->
            </div>


            <!-- ///////////// -->

            <div>
                <!-- small player with views -->
                <x-instagram-post />
                <!-- small player with views end -->
            </div>

            <div>
                <!-- small player with views -->
                <x-instagram-post />
                <!-- small player with views end -->
            </div>

            <div>
                <!-- small player with views -->
                <x-instagram-post />
                <!-- small player with views end -->
            </div>
            
            <!-- //////////// -->

            <div>
                <!-- small player with views -->
                <x-instagram-post />
                <!-- small player with views end -->
            </div>

            <div>
                <!-- small player with views -->
                <x-instagram-post />
                <!-- small player with views end -->
            </div>

            <div>
                <!-- small player with views -->
                <x-instagram-post />
                <!-- small player with views end -->
            </div>

        </div>
        <!-- video grid end -->

        <!-- bottom navigation -->
        <div class="sticky bottom-0 left-0 bg-white w-full py-2 px-3 mt-1 text-xs">
            <div class="flex justify-between items-center">
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Home</span>
                </div>
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <span>Friends</span>
                </div>
                <div class="flex flex-col items-center">
                    <button class="bg-black text-white px-5 py-2 rounded-md border border-pink-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                    <span>Inbox</span>
                </div>
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>Profile</span>
                </div>
            </div>
        </div>
        <!-- bottom navigation end -->
    </div>
</x-app-layout>

