<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-bold leading-tight text-gray-900">
            {{ auth()->user()->currentTeam->name }}
        </h2>
    </x-slot>

    <div class="p-5 pt-0">

        <div class="relative">
            <ul class="space-y-12 sm:grid sm:grid-cols-3 sm:gap-12 sm:space-y-0 lg:gap-x-8">
                @foreach (auth()->user()->currentTeam->teamShifts() as $member)
                    @if(isset($member->shifts[0]->status) && $member->shifts[0]->status == 'on')
                        <li class="p-5 mx-0 bg-white border border-gray-100 rounded-lg shadow-sm">
                            <div class="flex items-center space-x-4 lg:space-x-6">
                                <a href="#_" class="relative flex-shrink-0 w-16 h-16 lg:w-20 lg:h-20">
                                    <img class="w-16 h-16 rounded-full lg:w-20 lg:h-20"
                                    src="{{ $member->profile_photo_url }}"
                                    alt="">
                                    <span class="absolute bottom-0 right-0 w-4 h-4 mb-1 mr-1 bg-green-500 border-2 border-white rounded-full"></span>
                                </a>
                                <div class="space-y-1 text-lg font-medium leading-6">
                                    <h3>{{ $member->name }}</h3>
                                    <span class="text-xs leading-none text-gray-700 dark:text-dark-300">{{ $member->teamRole($member->currentTeam)->name }}</span>
                                    @forelse($member->tasks as $task)
                                        <p class="text-indigo-600">{{ $task->name }}</p>
                                    @empty
                                        <p class="text-gray-600">Not working on any tasks</p>
                                    @endforelse
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach
                @foreach (auth()->user()->currentTeam->teamShifts() as $member)
                    @if(!isset($member->shifts[0]->status) || $member->shifts[0]->status == 'off')
                        <li class="p-5 mx-0 bg-white border border-gray-100 rounded-lg shadow-sm">
                            <div class="flex items-center space-x-4 lg:space-x-6">
                                <a href="#_" class="relative flex-shrink-0 w-16 h-16 lg:w-20 lg:h-20">
                                    <img class="w-16 h-16 rounded-full lg:w-20 lg:h-20"
                                    src="{{ $member->profile_photo_url }}"
                                    alt="">
                                    <span class="absolute bottom-0 right-0 w-4 h-4 mb-1 mr-1 bg-gray-500 border-2 border-white rounded-full"></span>
                                </a>
                                <div class="space-y-1 text-lg font-medium leading-6">
                                    <h3>{{ $member->name }}</h3>
                                    <span class="text-xs leading-none text-gray-700 dark:text-dark-300">{{ $member->teamRole($member->currentTeam)->name }}</span>
                                    @forelse($member->tasks as $task)
                                        <p class="text-indigo-600">{{ $task->name }}</p>
                                    @empty
                                        <p class="text-gray-600">Not working on any tasks</p>
                                    @endforelse
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>

        </div>

    </div>


</x-app-layout>
