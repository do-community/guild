<x-guest-layout>

<x-jet-authentication-card>
    <x-slot name="logo"></x-slot>
    <div  x-data="{ step: 0 }">

        <section x-show="step==0" class="flex flex-col justify-start " x-cloak>
            <div  class="flex flex-col items-start mx-auto space-y-8 max-w-7xl">
                <h1 class="text-4xl font-bold">Welcome to <span class="text-green-400">Guild</span></h1>
                <p class="text-xl text-gray-600">Let's configure a few things and get your guild setup. This will only take 2 minutes.</p>
                <div @click="step++" class="inline-flex items-center px-5 py-3 pl-8 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md cursor-pointer hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25"><span class="mr-2 -ml-4">🚀</span> Let's Do This</div>
            </div>
        </section>

        <section x-show="step==1" class="flex flex-col" x-cloak>
            <div  class="flex flex-col items-start mx-auto space-y-8 max-w-7xl">
                <h1 class="text-4xl font-bold">About Your <span class="text-green-400">Company</span></h1>
                <p class="text-xl text-gray-600">First, you'll need to create an account, which will grant you access to your guild dashboard.</p>
                <div class="flex space-x-4">
                    <div @click="step--" class="inline-flex items-center px-5 py-3 text-xs font-semibold tracking-widest text-gray-800 uppercase transition duration-150 ease-in-out bg-gray-300 border border-transparent rounded-md cursor-pointer">Previous</div>
                    <div @click="step++" class="inline-flex items-center px-5 py-3 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md cursor-pointer hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">Next Step</div>
                </div>
            </div>
        </section>

            <div class="fixed bottom-0 z-50 flex items-center justify-between w-full max-w-sm mx-auto mb-10 ml-1">
                <div class="w-4 h-4 bg-green-400 rounded-full"></div>
                <div class="absolute w-full h-1 bg-green-400 rounded-full top-1/2 -mt-0.5"></div>
                <div :class="{ 'bg-green-400 border-transparent' : step == 1, 'border-green-400 bg-gray-100' : step != 1 }" class="relative flex items-center justify-center w-4 h-4 border-4 rounded-full"></div>
                <div class="relative flex items-center justify-center w-4 h-4 bg-gray-100 border-4 border-green-400 rounded-full"></div>
                <div class="relative flex items-center justify-center w-4 h-4 bg-gray-100 border-4 border-green-400 rounded-full"></div>
            </div>

    </div>

</x-jet-authentication-card>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>

</x-guest-layout>
