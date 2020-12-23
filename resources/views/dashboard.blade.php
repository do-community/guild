<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-bold leading-tight text-gray-900">
            {{ auth()->user()->currentTeam->name }}
        </h2>
    </x-slot>

    <div class="p-5 pt-0">

        <!-- Main Start Shift Top Bar -->
        <div class="p-5 mx-0 mb-5 bg-white border border-gray-100 rounded-lg shadow-sm">
            <div class="flex items-center space-x-4 lg:space-x-6">
                <a href="#_" class="relative flex-shrink-0 w-16 h-16 lg:w-20 lg:h-20">
                    <img class="w-16 h-16 rounded-full lg:w-20 lg:h-20"
                    src="{{ auth()->user()->profile_photo_url }}"
                    alt="">
                    <span class="absolute bottom-0 right-0 w-4 h-4 mb-1 mr-1 bg-green-500 border-2 border-white rounded-full"></span>
                </a>
                <div class="space-y-1 text-lg font-medium leading-6">
                    <h3>{{ auth()->user()->name }}</h3>
                    <span class="text-xs leading-none text-gray-700 dark:text-dark-300">{{ auth()->user()->teamRole(auth()->user()->currentTeam)->name }}</span>
                    @forelse(auth()->user()->tasks as $task)
                        <p class="text-indigo-600">{{ $task->name }}</p>
                    @empty
                        <p class="text-gray-600">Not working on any tasks</p>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- End Start Shift Top Bar -->

        <div class="relative">
            <ul class="space-y-12 sm:grid sm:grid-cols-3 sm:gap-5 sm:space-y-0">
                @foreach (auth()->user()->currentTeam->teamShifts() as $member)
                    @if( (isset($member->shifts[0]->status) && $member->shifts[0]->status == 'on') && auth()->user()->id != $member->id)

                        <li class="col-span-1 bg-white divide-y divide-gray-200 rounded-lg shadow-sm">
                            <div class="flex items-center justify-between w-full p-6 space-x-6">
                                <img class="flex-shrink-0 w-12 h-12 bg-gray-300 rounded-full" src="{{ $member->profile_photo_url }}" alt="">
                                <div class="flex-1 truncate">
                                    <div class="flex items-center space-x-3">
                                        <h3 class="text-sm font-medium text-gray-900 truncate">{{ $member->name }}</h3>
                                        @if($member->isOnShift())
                                            <span class="flex-shrink-0 inline-block px-2 py-0.5 text-green-800 text-xs font-medium bg-green-100 rounded-full">On Shift</span>
                                        @else
                                        <span class="flex-shrink-0 inline-block px-2 py-0.5 text-gray-800 text-xs font-medium bg-gray-100 rounded-full">Not on Shift</span>
                                        @endif
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500 truncate">Product Directives Officer</p>
                                </div>
                            </div>
                        </li>

                    @endif
                @endforeach
                @foreach (auth()->user()->currentTeam->teamShifts() as $member)
                    @if( (!isset($member->shifts[0]->status) || $member->shifts[0]->status == 'off') && auth()->user()->id != $member->id)
                        <li class="col-span-1 bg-white divide-y divide-gray-200 rounded-lg shadow-sm">
                            <div class="flex items-center justify-between w-full p-6 space-x-6">
                                <img class="flex-shrink-0 w-12 h-12 bg-gray-300 rounded-full" src="{{ $member->profile_photo_url }}" alt="">
                                <div class="flex-1 truncate">
                                    <div class="flex items-center space-x-3">
                                        <h3 class="text-sm font-medium text-gray-900 truncate">{{ $member->name }}</h3>
                                        @if($member->isOnShift())
                                            <span class="flex-shrink-0 inline-block px-2 py-0.5 text-green-800 text-xs font-medium bg-green-100 rounded-full">On Shift</span>
                                        @else
                                        <span class="flex-shrink-0 inline-block px-2 py-0.5 text-gray-800 text-xs font-medium bg-gray-100 rounded-full">Not on Shift</span>
                                        @endif
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500 truncate">
                                    @forelse($member->tasks as $task)
                                        {{ $task->name }}
                                    @empty
                                        Not working on any tasks
                                    @endforelse
                                    </p>
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>

        </div>

    </div>


</x-app-layout>
