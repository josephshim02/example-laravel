<x-layout>
    <x-slot:title>
        Show jobs
    </x-slot:title>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <div class="block px-4 py-6 rounded-lg">
        <h1 class="font-bold text-lg">{{$job->title}}</h1>
        <p>Salary: {{$job->salary}}</p>
    </div>

    <p>
        <x-button href="/jobs/{{ $job->id }}/edit">Edit</x-button>
    </p>
</x-layout>
