@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
{{--        <h2 class="text-2xl font-semibold"></h2>--}}
        <a href="{{ route('spasibo-list') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
            Сказать спасибо!
        </a>
    </div>
    <livewire:spasibo-journal-list />
@endsection
