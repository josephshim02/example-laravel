<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <h1 class="font-bold text-lg">{{$job['title']}}</h1>

    <p>Salary: {{$job['salary']}}</p>
</x-layout>
