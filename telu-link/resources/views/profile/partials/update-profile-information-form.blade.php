<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your profile photo. Name and email cannot be changed.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Profile Photo -->
        <div>
            <x-input-label for="profile_photo" :value="__('Profile Photo')" />

            @if(Auth::user()->profile_photo)
                <div class="mt-2 mb-3">
                    <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile Photo"
                        class="h-24 w-24 rounded-full object-cover">
                </div>
            @endif

            <input type="file" name="profile_photo" id="profile_photo" accept="image/*" class="mt-1 block w-full">
            <p class="mt-1 text-sm text-gray-500">Upload foto profil baru (kosongkan jika tidak ingin mengubah)</p>
            <x-input-error class="mt-2" :messages="$errors->get('profile_photo')" />
        </div>

        <!-- Name (Readonly) -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <input id="name" name="name" type="text"
                class="mt-1 block w-full bg-gray-100 border-gray-300 rounded-md cursor-not-allowed"
                value="{{ old('name', $user->name) }}" readonly />
            <p class="mt-1 text-sm text-gray-500">Nama tidak dapat diubah</p>
        </div>

        <!-- Email (Readonly) -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <input id="email" name="email" type="email"
                class="mt-1 block w-full bg-gray-100 border-gray-300 rounded-md cursor-not-allowed"
                value="{{ old('email', $user->email) }}" readonly />
            <p class="mt-1 text-sm text-gray-500">Email tidak dapat diubah</p>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>