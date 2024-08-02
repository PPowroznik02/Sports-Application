<x-guest-layout>


        <h2>Creating an event</h2>

        <form method="POST" action="/events">

            @csrf

            <!-- Name -->

            <div>

                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />

            </div>

            <!-- Email Address -->

            <div class="mt-4">

                <x-input-label for="type" :value="__('Type')" />

                <x-text-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" required />

                <x-input-error :messages="$errors->get('type')" class="mt-2" />

            </div>

            <!-- Password -->

            <div class="mt-4">

                <x-input-label for="location" :value="__('Location')" />

                <x-text-input id="location" class="block mt-1 w-full"

                              type="text"

                              name="location"

                              :value="old('location')"

                              required />

                <x-input-error :messages="$errors->get('location')" class="mt-2" />

            </div>

            <div class="mt-4">

                <x-input-label for="date" :value="__('Date')" />

                <x-text-input id="date" class="block mt-1 w-full" type="text" name="date" :value="old('date')" required />

                <x-input-error :messages="$errors->get('date')" class="mt-2" />

            </div>
            <div class="mt-4">

                <x-input-label for="p_limit" :value="__('P_limit')" />

                <x-text-input id="p_limit" class="block mt-1 w-full" type="text" name="p_limit" :value="old('p_limit')" required />

                <x-input-error :messages="$errors->get('p_limit')" class="mt-2" />

            </div>
            <div class="mt-4">

                <input type="hidden" name="owner" value="{{ Auth::id() }}">

            </div>
            <div class="flex items-center justify-end mt-4">

                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">

                    {{ __('Already registered?') }}

                </a>

                <x-primary-button class="ml-4">

                    {{ __('Create') }}

                </x-primary-button>

            </div>

        </form>



</x-guest-layout>
