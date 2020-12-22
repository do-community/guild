<nav x-data="{ open: false }" class="fixed top-0 left-0 z-10 flex flex-col items-start justify-between w-64 h-screen bg-white">

    <div class="relative flex flex-col">
        <div class="flex justify-start w-full pt-5 pl-5">
            <svg class="w-6 h-auto text-black fill-current" viewBox="0 0 1284 1479" xmlns="http://www.w3.org/2000/svg"><g stroke="none" stroke-width="1" fill-rule="evenodd"><g transform="translate(-608 -511)"><g transform="translate(608 511)"><path d="M683.972 1290.151l-41.96 19.542-41.977-19.522c-141.32-65.735-467.021-255.734-439.302-599.21 14.258-151.09 23.272-252.296 29.06-319.72l5.71-66.765 446.53-137.92 446.527 137.92 5.712 66.783c4.245 49.511 10.249 117.232 18.745 209.006H913.264c-4.468-48.398-8.22-89.865-11.361-125.244l-259.87-80.265-259.872 80.265c-5.594 63.132-13.131 145.767-23.291 253.286-15.462 191.766 168.32 319.934 283.084 380.657 90.57-48.02 224.132-138.345 268.744-270H641.89V659.83H1120.445c.839 8.922 1.698 18.028 2.576 27.322 27.992 346.838-297.711 537.205-439.05 602.998m597.599-616.868c-29.585-312.649-36.5-409.134-37.918-431.22l-3.031-57.169L642.05.005 43.58 185.127l-3.107 55.245c-.952 15.482-7.013 105.79-38.288 436.718-32.77 405.99 309.406 680.41 612.42 791.637l27.429 10.063 27.389-10.063c303.014-111.267 645.132-386.348 612.148-795.444" /></g></g></g></svg>
        </div>

        <div class="flex flex-col items-start w-full pl-5 mt-10 space-y-2">

                <a href="{{ route('dashboard') }}" class="@if(request()->routeIs('dashboard')){{ 'text-gray-800' }}@else{{ 'text-gray-400' }}@endif flex items-center pl-1 text-base font-semibold">
                    🏠 <span class="pl-2 text-sm">Home</span>
                </a>

                <a href="{{ route('shifts') }}" class="@if(request()->routeIs('shifts')){{ 'text-gray-800' }}@else{{ 'text-gray-400' }}@endif flex items-center pl-1 text-base font-semibold">
                    🕗 <span class="pl-2 text-sm">My Shift</span>
                </a>

                <a href="{{ route('tasks') }}" class="@if(request()->routeIs('tasks')){{ 'text-gray-800' }}@else{{ 'text-gray-400' }}@endif flex items-center pl-1 text-base font-semibold">
                    ✅ <span class="pl-2 text-sm">Tasks</span>
                </a>

        </div>
    </div>


    <!-- Bottom Items -->
    <div class="relative w-full">

        <!-- Shift Start/Stop -->
        <div class="relative flex w-full p-5">
            <button class="inline-flex items-center justify-center w-full px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">Start Shift</button>
        </div>

        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <button @click="open=!open" class="flex items-center justify-between w-full px-5 py-3 text-sm text-gray-400 transition duration-150 ease-in-out border-t border-gray-100 hover:text-gray-600 focus:outline-none hover:bg-gray-50">
                <div class="relative flex items-center font-semibold">
                    <img class="object-cover w-8 h-8 mr-2 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    <div class="flex flex-col">
                        <span class="font-semibold leading-none">{{ Auth::user()->name }}</span>
                        <span class="text-xs leading-none">not on shift</span>
                    </div>
                </div>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>
        @else
            <button class="flex items-center w-full px-5 py-3 text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
                <div>{{ Auth::user()->name }}</div>

                <div class="ml-1">
                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
        @endif

        <div x-show="open" class="fixed bottom-0 left-0 w-64 h-auto pl-1 ml-64 overflow-hidden origin-bottom-left"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                style="display: none;"
                @click="open = false">

                <div class="py-1 bg-white rounded-md shadow-xs">
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Account') }}
                    </div>

                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                        {{ __('Profile') }}
                    </x-jet-dropdown-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-jet-dropdown-link>
                    @endif

                    <div class="border-t border-gray-100"></div>

                    <!-- Guild Management -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Guild') }}
                        </div>

                        <!-- Guild Settings -->
                        <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                            {{ __('Guild Settings') }}
                        </x-jet-dropdown-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                {{ __('Create New Guild') }}
                            </x-jet-dropdown-link>
                        @endcan

                        <div class="border-t border-gray-100"></div>

                        <!-- Guild Switcher -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Guild') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-jet-switchable-team :team="$team" />
                        @endforeach

                        <div class="border-t border-gray-100"></div>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-jet-dropdown-link>
                    </form>
            </div>

        </div>

    </div>
    <!-- End Bottom Items -->

</nav>
