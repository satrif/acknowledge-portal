<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="sm:hidden">
        <p class="InfoHeading">Hello, {{ auth()->user()->name }}!</p>
        <p class="InfoAniv magrinHeadingAniv">You came to us on</p>
        <p class="InfoAniv">{{ \Carbon\Carbon::parse(auth()->user()->hiring_date)->format('d.m.Y') }}</p>
        <p class="InfoAniv magrinHeadingAniv">Your next <b>{{ $years }}-year</b> jubilee will be on</p>
        <p class="InfoAniv">{{ $next_anniversary_date }}</p>
        @if(Route::current()->uri() === 'spasibo')
            <a
                href="{{ route('spasibo-form') }}"
                type="button"
                class="tyButton">
                Say "Thank You!"
            </a>
        @else
            <a
                href="{{ route('spasibo-list') }}"
                type="button"
                class="tyButton">
                Show "Thank You!" List
            </a>
        @endif
    </div>
    <div class="sm:hidden">
        <p class="InfoHeading">Useful links:</p>
        <p><a class="link" href="#">HR-Portal</a></p>
        <p><a class="link" href="#">HR-Hotline</a></p>
        <p><a class="link" href="#">OrgStructure</a></p>
        <p><a class="link" href="#">Other important links</a></p>
    </div>
    <div class="grid grid-cols-5 gap-2">
        <div class="hidden sm:inline text-left">
            <div class="">
                <p class="InfoHeading">Hello, {{ auth()->user()->name }}!</p>
                <p class="InfoAniv magrinHeadingAniv">You came to us on</p>
                <p class="InfoAniv">{{ \Carbon\Carbon::parse(auth()->user()->hiring_date)->format('d.m.Y') }}</p>
                <p class="InfoAniv magrinHeadingAniv">Your next <b>{{ $years }}-year</b> jubilee will be on</p>
                <p class="InfoAniv">{{ $next_anniversary_date }}</p>
                @if(Route::current()->uri() === 'spasibo')
                    <a
                        href="{{ route('spasibo-form') }}"
                        type="button"
                        class="tyButton">
                        Say "Thank You!"
                    </a>
                @else
                    <a
                        href="{{ route('spasibo-list') }}"
                        type="button"
                        class="tyButton">
                        Show "Thank You!" List
                    </a>
                @endif
            </div>
        </div>
        <div class="sm:hidden col-span-full text-center">
            @if(Route::current()->uri() === 'spasibo')
            <livewire:spasibo-list />
            @else
            <livewire:spasibo-form />
            @endif
        </div>
        <div class="hidden sm:inline col-span-3">
            @if(Route::current()->uri() === 'spasibo')
                <livewire:spasibo-list />
            @else
                <livewire:spasibo-form />
            @endif
        </div>
        <div class="hidden sm:inline text-right">
            <div class="">
                <p class="InfoHeading">Useful links:</p>
                <p><a class="link" href="#">HR-Portal</a></p>
                <p><a class="link" href="#">HR-Hotline</a></p>
                <p><a class="link" href="#">OrgStructure</a></p>
                <p><a class="link" href="#">Other important links</a></p>
            </div>
        </div>
    </div>

</div>
