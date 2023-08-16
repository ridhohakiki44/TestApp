<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            User Avatar
        </h2>

        <img src="{{ "/storage/$user->avatar" }}" alt="user avatar" class=" w-20 rounded-full">

        <p class="mt-1 text-sm text-gray-600">
            Add or update avatar
        </p>
    </header>


    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form method="post" action="{{route('profile.avatar')}}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="avatar" value="Avatar" />
            <x-text-input id="avatar" name="avatar" type="file" class="mt-1 block w-full" :value="old('avatar', $user->avatar)"  autofocus autocomplete="avatar" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <div class="flex items-center gap-4 mt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
