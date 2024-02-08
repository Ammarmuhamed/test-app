<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('ticket.store') }}"  accept="multiple">
        @csrf

        <!-- Email Address -->
        <div class="mt-4">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" autofocus />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

        <!-- Password -->
        <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-textarea />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>


                <div class="mt-4">
                    <x-input-label for="attachment" :value="__('Attachment (if any)')" />
                    <x-file-input />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>


                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-3">
                        Create
                    </x-primary-button>
                </div>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</x-guest-layout>