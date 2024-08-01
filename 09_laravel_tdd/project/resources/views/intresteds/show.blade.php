<x-guest-layout>

    {{-- adapted from resources/views/components/auth-card.blade.php --}}

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

        <div>

            <h2>List of interested</h2>

        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            {{-- created based on https://flowbite.com/docs/typography/lists/ --}}

            <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">

                @if (count($intresteds) === 0)

                    There are no participants.

                @else

                    <table>


                        @foreach($intresteds as $intrested)

                            <tr>

                                <p class="text-lg font-semibold text-gray-700">{{ $intrested->name }}</p>

                                @if(Auth::id() == $intrested->user_id)
                                    <form action="{{ route('intresteds.destroy', [$intrested->intrested_id]) }}" method="POST" class="inline-block ml-4">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="Delete" class="text-red-600 hover:underline cursor-pointer">
                                    </form>
                                @endif

                            </tr>

                        @endforeach

                    </table>

                @endif


            </dl>

            <x-primary-button class="ml-4">

                <a href="/events">Events</a>

            </x-primary-button>

        </div>

    </div>

</x-guest-layout>
