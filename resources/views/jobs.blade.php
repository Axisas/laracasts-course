<x-layout>

    <x-slot:heading>
        About Page
    </x-slot:heading>


    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="hover:underline block px-4 py-6 border border-gray-300 rounded-lg">
                <div class="font-bold text-blue-700 hover:underline">
                    {{ $job->employer->name }}
                </div>

                <div>
                    <strong>{{ $job['title'] }}</strong> : Pays {{ $job['salary'] }} per year.
                </div>
            </a>
        @endforeach

        <div>
            {{ $jobs->links() }}
        </div>


    </div>

</x-layout>