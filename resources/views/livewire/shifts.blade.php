<div>
    <form wire:submit.prevent="changeShiftStatus()">
        <input type="hidden" wire:model="task_id">
        <button wire:submit.prevent="changeShiftStatus()"
            class="inline-flex items-center justify-center w-full px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out @if(auth()->user()->isOnShift()){{ 'bg-green-400 hover:bg-green-500 active:bg-green-500 focus:outline-none focus:border-green-500 focus:shadow-outline-green' }}@else{{ 'bg-gray-800 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray' }}@endif border border-transparent rounded-md disabled:opacity-25">
            {{ $action }} Shift
        </button>
    </form>
</div>
