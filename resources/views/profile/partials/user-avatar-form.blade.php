<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            user avatar 
        </h2>

        <img src="{{ '/storage/$user->avatar'}}" alt="user avatar">
        <form action="{{ route('profile.avatar.ai') }}" method="post">
        
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            generate bu avatar 

        </p>
        
        <x-primary-button>generate  avatar</x-primary-button>

        </form>




    </header>



     @if (session('message'))
         <div class="text-red-500">
               {{ session('message') }}
         </div>
        @endif



        <form method="post" action="{{ route('profile.avatar') }}">
            @method('patch')
            @csrf
        <div>
            <x-input-label for="name" value="avatar" />
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" 
            :value="old('avatar', $user->avatar)"  autofocus autocomplete="avatar" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>


        <div class="flex items-center  mt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            
        </div>
        </form>
</section>
