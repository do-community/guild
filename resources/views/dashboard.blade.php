<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-bold leading-tight text-gray-900">
            {{ auth()->user()->currentTeam->name }}
        </h2>
    </x-slot>

    <div class="p-5 pt-0">

        <div class="flex w-full space-x-5">
            <!-- Main Start Shift Top Bar -->
            <div class="w-1/2 mx-0 mb-5 overflow-hidden bg-white border border-gray-100 rounded-lg shadow-sm">
                <div class="flex flex-col">
                    <div class="relative flex items-center p-5 space-x-4 lg:space-x-2">
                        <a href="#_" class="relative flex-shrink-0 w-10 h-10 lg:w-12 lg:h-12">
                            <img class="w-10 h-10 rounded-full lg:w-12 lg:h-12" src="{{ auth()->user()->profile_photo_url }}" alt="">
                            <span class="absolute bottom-0 right-0 w-4 h-4 mb-0 mr-0 bg-green-500 border-2 border-white rounded-full"></span>
                        </a>
                        <input type="text" class="w-full h-12 px-3 text-xl focus:outline-none" placeholder="What are you doing?">
                        <button class="inline-flex items-center justify-center flex-shrink-0 w-auto px-4 py-2 text-xs font-semibold tracking-wide text-center text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">Update Status</button>
                    </div>

                    <div class="flex justify-between items-center p-5 space-x-4 @if(auth()->user()->isOnShift()){{ 'bg-green-400' }}@else{{ 'bg-gray-200' }}@endif">
                        @if(auth()->user()->isOnShift())
                            <p class="pl-1 font-bold text-white">You are currently on shift</p>
                        @else
                            <p class="pl-1 font-semibold text-gray-500">You are currently not on shift</p>
                        @endif
                        <div class="border border-green-300 rounded-md">
                        @livewire('shifts')
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Start Shift Top Bar -->

            <div class="w-1/2 p-5 mx-0 mb-5 bg-white border border-gray-100 rounded-lg shadow-sm">

            </div>

        </div>

        <div class="relative">
            <ul class="space-y-12 sm:grid sm:grid-cols-3 sm:gap-5 sm:space-y-0">

                <!-- Show the authenticated user first -->
                @include('partials.member-card', ['member' => auth()->user()])

                @foreach (auth()->user()->currentTeam->teamShifts() as $member)
                    @if( auth()->user()->id != $member->id)
                        @include('partials.member-card', ['member' => $member])
                    @endif
                @endforeach

            </ul>

        </div>

    </div>


</x-app-layout>
