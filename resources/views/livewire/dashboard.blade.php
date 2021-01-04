<div class="p-5 pt-0">

        <div class="flex w-full space-x-5">
            <!-- Main Start Shift Top Bar -->
            <div class="w-1/2 mx-0 mb-5 overflow-hidden bg-white border border-gray-100 rounded-lg shadow-sm">
                <div class="flex flex-col">
                    <form wire:submit.prevent="store()" class="relative flex items-center p-5 space-x-4 lg:space-x-2">
                        <a href="#_" class="relative flex-shrink-0 w-10 h-10 lg:w-12 lg:h-12">
                            <img class="w-10 h-10 rounded-full lg:w-12 lg:h-12" src="{{ auth()->user()->profile_photo_url }}" alt="">
                            <span class="absolute bottom-0 right-0 w-4 h-4 mb-0 mr-0 @if($shift) bg-green-400 @else bg-gray-300 @endif border-2 border-white rounded-full"></span>
                        </a>
                        <input wire:model="body" type="text" class="w-full h-12 px-3 text-xl border-0 focus:outline-none focus:border-0 focus:ring-0" placeholder="What are you doing?">
                        <button wire:submit.prevent="store()" class="inline-flex items-center justify-center flex-shrink-0 w-auto px-4 py-2 text-xs font-semibold tracking-wide text-center text-white transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">Update Status</button>
                    </form>

                    <div class="flex justify-between items-center p-5 space-x-4 @if($shift){{ 'bg-green-400' }}@else{{ 'bg-gray-200' }}@endif">
                        @if($shift)
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

        <div class="mx-auto max-w-7xl sm:px-1 lg:px-1">
            <div class="py-2">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="flex flex-col mt-10">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <div class="px-6 py-8">
                                    <div class="container flex justify-between mx-auto">
                                        <div class="w-full lg:w-8/12">
                                            <div class="flex items-center justify-between">
                                                <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Feed</h1>
                                            </div>
                                            <div>
                                                @livewire('posts')
                                            </div>
                                        </div>
                                        <div class="hidden w-4/12 -mx-8 lg:block">
                                            <div class="px-1">
                                                <h1 class="mb-4 text-xl font-bold text-gray-700">Guild members</h1>
                                                <div class="relative">
                                                    <ul class="space-y-12">
                                                        @include('partials.member-card', ['member' => auth()->user()])
                                                        @foreach (auth()->user()->currentTeam->teamShifts() as $member)
                                                            @if( auth()->user()->id != $member->id)
                                                                @include('partials.member-card', ['member' => $member])
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- @if( count($shifts) > 0 )
                                    <div wire:click="loadMore()" class="flex items-center justify-start w-full py-2 pl-8 text-xs font-medium text-gray-500 duration-200 ease-out bg-gray-200 cursor-pointer hover:text-gray-600 hover:bg-gray-300 transition-color md:pl-0 md:justify-center">Load More</div>
                                    @else
                                        <div class="flex items-center justify-start w-full py-2 pl-8 text-xs font-medium text-gray-500 duration-200 ease-out bg-gray-100 transition-color md:pl-0 md:justify-center">No more entries</div>
                                    @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
