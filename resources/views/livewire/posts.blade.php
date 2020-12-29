<div>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium text-gray-900">Share what's on your mind!</h3>

                        <p class="mt-1 text-sm text-gray-600">
                            <p>Current guild: <strong>{{ auth()->user()->currentTeam->name }}</strong></p>
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    @include('livewire.addPost')
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex flex-col mt-10">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="px-6 py-8">
                                <div class="container flex justify-between mx-auto">
                                    <div class="w-full lg:w-8/12">
                                        <div class="flex items-center justify-between">
                                            <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Post</h1>
                                            {{-- <div>
                                                <select class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                    <option>Latest</option>
                                                    <option>Last Week</option>
                                                </select>
                                            </div> --}}
                                        </div>
                                        @foreach($posts as $post)
                                            <div class="mt-6">
                                                <div class="max-w-4xl px-10 py-6 bg-white rounded-lg shadow-md">
                                                    <div class="flex items-center justify-between"><span
                                                            class="font-light text-gray-600">{{ $post->created_at->format('h:m - d/ M/Y') }}</span>
                                                    </div>
                                                    <div class="mt-2">
                                                        <p class="mt-2 text-gray-600">
                                                            {!! Markdown::convertToHtml($post->body) !!}
                                                        </p>
                                                    </div>
                                                    <div class="flex items-center justify-between mt-4">
                                                        <div>
                                                            @if(auth()->user()->id === $post->user_id)
                                                                <a wire:click.prevent="delete({{ $post->id }})" role="button" href="#"
                                                                    class="text-red-500 hover:underline">Delete
                                                                </a>
                                                            @endif
                                                        </div>
                                                        <div>
                                                            <a class="flex items-center"><img
                                                                    src="{{ $post->user->profile_photo_url }}"
                                                                    alt="avatar"
                                                                    class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                                                                <h1 class="font-bold text-gray-700 hover:underline">{{ $post->user->name }}</h1>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="hidden w-4/12 -mx-8 lg:block">
                                        <div class="px-8">
                                            <h1 class="mb-4 text-xl font-bold text-gray-700">Guild members</h1>
                                            <div class="relative">
                                                <ul class="space-y-12">
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

<script type="text/javascript">
    window.onscroll = function(ev) {
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
            window.livewire.emit('load-more');
        }
    };
</script>