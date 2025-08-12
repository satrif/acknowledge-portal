<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="grid grid-cols-5 gap-2">
        <div class="text-left">
            <div class="">
                <p class="InfoHeading">Hello {{ auth()->user()->name }}!</p>
                <p class="InfoAniv magrinHeadingAniv">You came to us on</p>
                <p class="InfoAniv">{{ \Carbon\Carbon::parse(auth()->user()->hiring_date)->format('d.m.Y') }}</p>
                <p class="InfoAniv magrinHeadingAniv">Your next <b>{{ $years }}-year</b> jubilee will be on</p>
                <p class="InfoAniv">{{ $next_anniversary_date }}</p>
            </div>
        </div>
        <div class="col-span-3 text-center">
            @if(Route::current()->uri() === 'spasibo')
            <livewire:spasibo-list />
            @else
            <livewire:spasibo-form />
            @endif
        </div>
        <div class="text-right">
            right
        </div>
    </div>

</div>
