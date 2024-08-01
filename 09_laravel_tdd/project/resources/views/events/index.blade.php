<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center bg-blue-100 relative py-6">
        <div class="p-6 text-gray-900">
            <x-primary-button>
                <a href="/dashboard">Dashboard</a>
            </x-primary-button>
        </div>
        <form action="{{ route('search') }}" method="GET" class="bg-white p-6 rounded-lg shadow-md w-full max-w-md mb-6">
            <div class="form-group mb-4">
                <label for="dropdown" class="block text-gray-700 mb-2">Select a search option:</label>
                <select name="dropdown" id="dropdown" class="form-control w-full p-2 border border-gray-300 rounded">
                    <option type="text" value="">--Select--</option>
                    <option type="text" value="name">Name</option>
                    <option type="text" value="type">Type</option>
                    <option type="text" value="location">Location</option>
                </select>
            </div>

            <div class="form-group mb-4">
                <label for="search" class="block text-gray-700 mb-2">Search:</label>
                <input type="text" name="search" id="search" class="form-control w-full p-2 border border-gray-300 rounded" />
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Search</button>
        </form>

        <form action="{{ route('sort') }}" method="GET" class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
            <div class="form-group mb-4">
                <label for="sort" class="block text-gray-700 mb-2">Select a sort option:</label>
                <select name="sort" id="sort" class="form-control w-full p-2 border border-gray-300 rounded">
                    <option type="text" value="">--Select--</option>
                    <option type="text" value="date">Date</option>
                    <option type="text" value="p_limit">People limit</option>
                </select>
            </div>

            <div class="form-group mb-4">
                <label for="sort_style" class="block text-gray-700 mb-2">Select a sort style:</label>
                <select name="sort_style" id="sort_style" class="form-control w-full p-2 border border-gray-300 rounded">
                    <option type="text" value="ASC">Ascending</option>
                    <option type="text" value="DESC">Descending</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Sort</button>
        </form>
    </div>


    <div>

        <div>
            <h2 class="text-2xl font-bold mt-6 px-6 text-center">List of events</h2>
        </div>

        <div class="w-full sm:max-w-md px-6 py-4 mt-6 bg-cornflowerblue shadow-md overflow-hidden sm:rounded-lg relative z-10">
            @if (count($events) === 0)
                <p class="text-center text-gray-700">There are no events.</p>
            @else
                <div class="space-y-4">
                    @foreach($events as $event)
                        <div class="p-4 bg-white border border-gray-200 rounded-lg">
                            <div class="flex justify-between items-center">
                                <div class="text-gray-900 font-bold">
                                    @markdown($event->name)
                                </div>
                                <div>
                                    <form action="/events/{{$event->id}}" method="GET">
                                        <x-primary-button type="submit">
                                            Details
                                        </x-primary-button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="flex space-x-4 mt-4">
                <x-primary-button>
                    <a href="{{route('events.create')}}">Create new event</a>
                </x-primary-button>
                <x-primary-button>
                    <a href="/events">Events</a>
                </x-primary-button>
            </div>
        </div>
    </div>
</x-guest-layout>
