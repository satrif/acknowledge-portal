<div>
    <form wire:submit.prevent="save">
        <div class="grid grid-cols-1 gap-6">
            <p class="text-2xl border-b">Send "Thank You!" Form</p>
            <div>
                <label for="to" class="block text-lg font-medium text-gray-700">Select employee:</label>
                <select id="to" name="to" wire:model="to" class="w-1/3 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name . ' (' . $user->department . ')' }}</option>
                    @endforeach
                </select>
                @error('to') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
        </div>
    </form>
</div>
