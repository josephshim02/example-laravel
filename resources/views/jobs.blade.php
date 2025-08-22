<x-layout>
    <x-slot:heading>
        Jobs
    </x-slot:heading>
    <div class="space-y-4">
        @foreach ($jobs as $job)

            <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg hover:bg-gray-600">
                <div class="text-lg font-semibold">
                    {{ $job->employer->name }}
                </div>
                <div>
                    <strong>{{$job['title']}}: </strong> pays ${{$job['salary']}} per year
                </div>
            </a>
        @endforeach
        <div>
            {{ $jobs->links() }}
        </div>
    </div>

</x-layout>
