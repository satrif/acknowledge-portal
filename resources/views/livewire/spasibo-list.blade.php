<div>
    {{-- The Master doesn't talk, he acts. --}}
    <!-- Пагинация -->
    <div class="flex border items-center justify-between">
        <div class="flex-1 flex justify-between sm:hidden">
            @if($spasibos->onFirstPage())
                <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-300 bg-white">
                    Previous
                </span>
            @else
                <button wire:click="previousPage" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Previous
                </button>
            @endif

            @if($spasibos->hasMorePages())
                <button wire:click="nextPage" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                    Next
                </button>
            @else
                <span class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-300 bg-white">
                    Next
                </span>
            @endif
        </div>

        <div class="hidden gap-1 sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Showing
                    <span class="font-medium">{{ $spasibos->firstItem() }}</span>
                    to
                    <span class="font-medium">{{ $spasibos->lastItem() }}</span>
                    of
                    <span class="font-medium">{{ $spasibos->total() }}</span>
                    results
                </p>
            </div>

            <div>
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    {{ $spasibos->links() }}
                </nav>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-6 gap-0 divide-y divide-x divide-dashed divide-blue-30">
            <div class="text-center font-semibold bg-sky-500/75">From</div>
            <div class="text-center font-semibold bg-sky-500/75">To</div>
            <div class="text-center font-semibold bg-sky-500/75">Value</div>
            <div class="text-center font-semibold bg-sky-500/75">Comment</div>
            <div class="text-center font-semibold bg-sky-500/75">Nomination</div>
            <div class="text-center font-semibold bg-sky-500/75">Like</div>
    </div>

        @foreach($spasibos as $spasibo)
        <div class="grid grid-cols-6 gap-0 divide-y divide-x divide-dashed divide-blue-30">
            <div class="text-center{{ ($spasibo->uid_send === null) ? " bg-gray-500" : "" }}">{{ ($spasibo->uid_send === null) ? 'Anonymous' : $spasibo->name_send }}</div>
            <div class="text-center">{{ $spasibo->name_to }}</div>
            <div class="text-center">{{ $spasibo->val_name }}</div>
            <div class="text-center">{{ $spasibo->description }}</div>
            <div class="text-center">{{ $spasibo->nom_name }}</div>
            <div class="text-center">{{ $spasibo->likes_count }}</div>
        </div>
        @endforeach

</div>

