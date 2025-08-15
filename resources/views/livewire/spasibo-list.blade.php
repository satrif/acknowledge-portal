<div>
    {{-- The Master doesn't talk, he acts. --}}
    <!-- Пагинация -->
    <div class="flex items-center justify-between">
        <div>
            <div class="gap-1 sm:flex sm:items-center sm:justify-start sm:hidden">
                <label for="searchMob" class="block text-sm font-medium text-gray-700">Filter:</label>
                <input type="text" wire:model="search" wire:keydown="goSearch" id="searchMob" class="p-0 block w-full rounded-md border-gray-300 shadow-sm">
                @error('search') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="flex-1 flex justify-between sm:hidden">
                @if($spasibos->onFirstPage())
                    <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-300 bg-white">
                    Previous
                </span>
                @else
                    <button wire:click="setPage({{ $spasibos->currentPage() - 1 }})"
                            wire:loading.attr="disabled" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        Previous
                    </button>
                @endif

                @if($spasibos->hasMorePages())
                    <button wire:click="setPage({{ $spasibos->currentPage() + 1 }})"
                            wire:loading.attr="disabled" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        Next
                    </button>
                @else
                    <span class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-300 bg-white">
                    Next
                </span>
                @endif
            </div>
        </div>


        <div class="hidden gap-1 sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div class="gap-1 sm:flex sm:items-center sm:justify-start">
                <label for="search" class="block text-sm font-medium text-gray-700">Filter:</label>
                <input type="text" wire:model="search" wire:keydown="goSearch" id="search" class="p-0 block w-full rounded-md border-gray-300 shadow-sm">
                @error('search') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    {{ $spasibos->links('vendor.pagination.tailwind-custom') }}
                </nav>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-6 gap-0 divide-y divide-x divide-dashed divide-blue-30">
            <div class="text-center font-semibold bg-gray-500/75">From</div>
            <div class="text-center font-semibold bg-gray-500/75">To</div>
            <div class="text-center font-semibold bg-gray-500/75">Value</div>
            <div class="text-center font-semibold bg-gray-500/75">Comment</div>
            <div class="text-center font-semibold bg-gray-500/75">Nomination</div>
            <div class="text-center font-semibold bg-gray-500/75">Like</div>
    </div>

    @foreach($spasibos as $spasibo)
    <div class="grid grid-cols-6 gap-0 divide-y divide-x divide-dashed divide-blue-30 hover:bg-white">
        <div class="text-center">{{ $spasibo->name_send }}</div>
        <div class="text-center">{{ $spasibo->name_to }}</div>
        <div class="text-center">{{ $spasibo->val_name }}</div>
        <div class="text-center">{{ $spasibo->description }}</div>
        <div class="text-center">{{ $spasibo->nom_name }}</div>
        <div class="text-center">
            <div class="group relative inline-block">
                <div class="
                relative
                inline-block
                w-12 h-12
                mx-auto
                cursor-pointer
                " style="background-image: url('{{ asset('images/heart.png') }}')"
                wire:click="makeLike({{ $spasibo->id }})"
                >
                    <div class="
                    absolute
                    top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2
                    w-full
                    px-2
                    text-center
                    font-bold
                    text-white
                    text-sm
                    leading-tight
                    ">
                        {{ $spasibo->likes_count }}
                    </div>
                </div>
                <!-- Подсказка (появляется при наведении) -->
                <div class="
                            absolute left-full top-1/2 ml-2 transform -translate-y-1/2
                            hidden group-hover:block
                            bg-gray-800 text-white text-sm rounded px-2 py-1
                            whitespace-nowrap
                          ">
                    @if(is_null($spasibo->likers))
                        <p>No likes were made</p>
                    @else
                        @php
                            $likers = explode(';',$spasibo->likers);
                        @endphp
                        @foreach($likers as $liker)
                            <p class="m-0 p-0">{{ $liker }}</p>
                        @endforeach
                    @endif
                    <!-- Стрелка (опционально, теперь смотрит вверх) -->
                    <div class="
                            absolute right-full top-1/2 -translate-y-1/2 w-0 h-0
                            border-t-4 border-b-4 border-l-0 border-r-4 border-t-transparent border-b-transparent border-r-gray-800
                            "></div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>

