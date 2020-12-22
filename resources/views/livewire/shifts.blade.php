<div>
    <form wire:submit.prevent="changeShiftStatus()">
        <input type="hidden" wire:model="task_id">
        <button wire:submit.prevent="changeShiftStatus()"
            class="inline-flex items-center justify-center w-full px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
            {{ $action }} Shift
        </button>
    </form>
</div>