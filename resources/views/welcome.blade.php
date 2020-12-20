<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guild - Build a Team Culture</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css">
    <style>[x-cloak]{ display:none; }</style>
</head>
<body class="w-screen-h-screen" x-data="{ step: 0 }">



    <section x-show="step==0" class="w-screen h-screen flex flex-col items-center justify-center" x-cloak>
        <div  class="max-w-7xl mx-auto flex flex-col items-center space-y-8">
            <h1 class="text-5xl font-bold sm:text-7xl lg:text-8xl font-bold">Welcome to <span class="text-green-400">Guild</span></h1>
            <p class="text-xl text-gray-600 text-center">Let's configure a few things and get your guild setup. This will only take 2 minutes.</p>
            <div @click="step++" class="w-full cursor-pointer px-12 py-6 text-2xl font-medium text-center text-white bg-green-400 hover:bg-green-500 shadow-xl lg:w-auto rounded-3xl"><span class="-ml-4 mr-2">🚀</span> Let's Do This</div>
        </div>
    </section>

    <section x-show="step==1" class="w-screen h-screen flex flex-col items-center justify-center" x-cloak>
        <div  class="max-w-7xl mx-auto flex flex-col items-center space-y-8">
            <h1 class="text-5xl font-bold sm:text-7xl lg:text-8xl font-bold">Create An Account</h1>
            <p class="text-xl text-gray-600 text-center">First, you'll need to create an account, which will grant you access to your guild dashboard.</p>
            <div @click="step++" class="w-full cursor-pointer px-12 py-6 text-2xl font-medium text-center text-white bg-green-400 hover:bg-green-500 shadow-xl lg:w-auto rounded-3xl">Next Step</div>
        </div>
    </section>

    <div class="fixed bottom-0 w-full flex justify-center">
        <div class="w-full max-w-xs mx-auto z-50 fixed bottom-0 flex items-center justify-between mb-10">
            <div class="w-4 h-4 rounded-full bg-green-400"></div>
            <div class="absolute w-full h-1 bg-green-400 rounded-full top-1/2 -mt-0.5"></div>
            <div :class="{ 'bg-green-400 border-transparent' : step == 1, 'border-green-400 bg-gray-100' : step != 1 }" class="w-4 h-4 rounded-full border-4 flex items-center justify-center relative"></div>
            <div class="w-4 h-4 rounded-full border-4 border-green-400 bg-gray-100 flex items-center justify-center relative"></div>
            <div class="w-4 h-4 rounded-full border-4 border-green-400 bg-gray-100 flex items-center justify-center relative"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
</body>
</html>
