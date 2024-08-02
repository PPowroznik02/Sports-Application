<x-guest-layout>


    <h2 class="text-2xl font-bold mt-6 px-6 text-center">Editing an event</h2>

    <form method="POST" action="/events/{{$event -> id}}">

        @csrf
        @method('PUT')
        <!-- Name -->

        <div class="mt-4">

            <x-input-label for="name">NAME:</x-input-label>

            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$event->name}}"/>

            <x-input-error :messages="$errors->get('name')" class="mt-2" />

        </div>

        <!-- Email Address -->

        <div class="mt-4">

            <x-input-label for="type" :value="__('Type')" />

            <x-text-input id="type" class="block mt-1 w-full" type="text" name="type" value="{{$event->type}}"/>

            <x-input-error :messages="$errors->get('type')" class="mt-2" />

        </div>

        <!-- Password -->

        <div class="mt-4">

            <x-input-label for="location" :value="__('Location')" />

            <x-text-input id="location" class="block mt-1 w-full"

                          type="text"

                          name="location"

                          value="{{$event->location}}"

                          required />

            <x-input-error :messages="$errors->get('location')" class="mt-2" />

        </div>

        <div class="mt-4">

            <x-input-label for="date" :value="__('Date')" />

            <x-text-input id="date" class="block mt-1 w-full" type="text" name="date" value="{{$event->date}}" required />

            <x-input-error :messages="$errors->get('date')" class="mt-2" />

        </div>
        <div class="mt-4">

            <x-input-label for="p_limit" :value="__('P_limit')" />

            <x-text-input id="p_limit" class="block mt-1 w-full" type="text" name="p_limit" value="{{$event->p_limit}}"/>

            <x-input-error :messages="$errors->get('p_limit')" class="mt-2" />

        </div>
        <div class="mt-4">

            <input type="hidden" name="owner" value="{{ Auth::id() }}">

        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">

                {{ __('Submit') }}

            </x-primary-button>

        </div>

    </form>



</x-guest-layout>
