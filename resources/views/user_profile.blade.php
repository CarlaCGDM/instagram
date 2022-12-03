<!-- esta es la vista donde puedes ver todos los posts que ha hecho un mismo usuario, ya seas tu mismo u otro usuario en el cual hagas clic -->

<x-app-layout>
   <!-- component -->
<div class="relative mx-auto my-3">
    
        <!-- top header -->
        <div class="flex flex-col justify-center items-center my-5" >
            <div class="w-24 h-24 bg-cover bg-center bg-no-repeat rounded-full mt-6" style="background-image: url('https://img.freepik.com/premium-vector/gamer-mascot-geek-boy-esports-logo-avatar-with-headphones-glasses-cartoon-character_8169-228.jpg');"></div>
            <span class="my-3">@_geeeky_gamer</span>
            <p class="mb-3">Description about me goes here</p>
        </div>
        <!-- top header end -->

        <!-- video grid -->
        <div class="grid grid-cols-5 gap-0.5 mt-2">

           <div>
            <x-instagram-post />
           </div>
           <div>
            <x-instagram-post />
           </div>
           <div>
            <x-instagram-post />
           </div>
           <div>
            <x-instagram-post />
           </div>
           <div>
            <x-instagram-post />
           </div>
           <div>
            <x-instagram-post />
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