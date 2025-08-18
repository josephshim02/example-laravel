<x-layout>
    <x-slot:heading>
        Jobs
    </x-slot:heading>
    <h1>Job listings:</h1>
    <ul>
        @foreach ($jobs as $job)
        <li>
            <a href="/jobs/{{ $job['id'] }}" class="text-blue-500 hover:underline">
                <strong>{{$job['title']}}: pays {{$job['salary']}} per year</strong>
            </a>
        </li>
    @endforeach
    </ul>

</x-layout>
