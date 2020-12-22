<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-bold leading-tight text-gray-900">
            {{ __('Your Shift Status') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium text-gray-900">Change your shift status!</h3>

                            <p class="mt-1 text-sm text-gray-600">
                                <p>Current guild {{ auth()->user()->currentTeam->name }}</p>
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif

                        <div class="overflow-hidden shadow sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <h3>Total Hours Worked for current guild: <span>{{  auth()->user()->totalHoursWorked() }}</span></h3>
                                        <label class="block text-sm font-medium text-gray-700" for="current_password">
                                            Currently not on shift.
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-end px-4 py-3 text-right bg-gray-50 sm:px-6">
                                @livewire('shifts')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
