<x-guest-layout>

    {{-- adapted from resources/views/components/auth-card.blade.php --}}

    <div class="min-h-screen flex flex-col bg-cornflowerblue sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

        <div class="mb-4 text-center">
            <h2 class="text-2xl font-bold text-gray-800">Viewing an Event</h2>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg text-center">

            <div class="mb-4">
                <p class="text-lg font-semibold text-gray-700">{{$event->name}}</p>
                <p class="text-sm text-gray-600">Type: {{$event->type}}</p>
                <p class="text-sm text-gray-600">Date: {{$event->date}}</p>
                <p class="text-sm text-gray-600">Location: {{$event->location}}</p>
                <p class="text-sm text-gray-600">Owner: {{$event->owner}}</p>
            </div>

            @if(Auth::id() == $event->owner)
                <div class="mb-4">
                    <a href="{{route('events.edit',$event)}}" class="text-blue-600 hover:underline">Edit</a>

                    <form action="{{route('events.destroy',$event)}}" method="post" class="inline-block ml-4">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" class="text-red-600 hover:underline cursor-pointer">
                    </form>
                </div>
            @endif

            <div class="flex space-x-4 mb-4">
                <form method="POST" action="{{route('intrested.store',$event)}}">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <input type="hidden" name="intrested_id" value="{{ Auth::id() }}">
                    <x-primary-button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                        {{ __('Interested') }}
                    </x-primary-button>
                </form>

                <form method="POST" action="{{route('participant.store',$event)}}">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <input type="hidden" name="participant_id" value="{{ Auth::id() }}">
                    <input type="hidden" name="owner_id" value="{{ $event->owner }}">
                    <input type="hidden" name="p_limit" value="{{ $event->p_limit }}">
                    <x-primary-button class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">
                        {{ __('Participant') }}
                    </x-primary-button>
                </form>
            </div>

            {{-- created based on https://flowbite.com/docs/typography/links/ --}}

            <a href="/events" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mt-8 block text-center">All events...</a>

        </div>

    </div>

</x-guest-layout>
