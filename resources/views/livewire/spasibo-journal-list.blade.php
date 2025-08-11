<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="grid grid-cols-5 gap-2">
        <div class="text-left border">
            left
        </div>
        <div class="col-span-3 text-center border">
            @if(Route::current()->uri() === 'spasibo')
            <livewire:spasibo-list />
            @else
            <livewire:spasibo-form />
            @endif
        </div>
        <div class="text-right border">
            right
        </div>
    </div>

</div>
