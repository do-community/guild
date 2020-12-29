<div>
    <form wire:submit.prevent="store()">
        <div class="overflow-hidden shadow sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-4">
                        <label class="block text-sm font-medium text-gray-700" for="current_password">
                            Post content
                        </label>
                        @error('body') <span class="text-danger">{{ $message }}</span>@enderror
                        <textarea class="block w-full mt-1 rounded-md shadow-sm form-input"
                            wire:model="body"></textarea>

                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end px-4 py-3 text-right bg-gray-50 sm:px-6">

                <button wire:submit.prevent="store()"
                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                    Post
                </button>
            </div>
        </div>
    </form>
</div>