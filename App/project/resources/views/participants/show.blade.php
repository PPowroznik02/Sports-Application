<x-guest-layout>

    {{-- adapted from resources/views/components/auth-card.blade.php --}}

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 text-center">

        <div >

            <h2 class="text-2xl font-bold mt-6 px-6">List of participants</h2>

        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg text-center">

            {{-- created based on https://flowbite.com/docs/typography/lists/ --}}

            <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700 ">

                @if (count($participants) === 0)

                    There are no participants.

                @else

                    <table>


                        @foreach($participants as $participant)

                            <tr>

                                <td>

                                    <p class="text-lg font-semibold text-gray-700">{{ $participant->name }}</p>

                                    @if(Auth::id() == $participant->owner_id or Auth::id() == $participant->user_id)
                                    <form action="{{ route('participants.destroy', [$participant->participant_id]) }}" method="POST" class="inline-block ml-4">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="Delete" class="text-red-600 hover:underline cursor-pointer">
                                    </form>
                                    @endif

                                </td>

                            </tr>

                        @endforeach

                    </table>

                @endif

                    <x-primary-button class="ml-4">

                        <a href="/events">Events</a>

                    </x-primary-button>

            </dl>

        </div>

    </div>

</x-guest-layout>
