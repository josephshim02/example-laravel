<x-layout>
    <x-slot:title>
        Show jobs
    </x-slot:title>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <div class="block px-4 py-6 rounded-lg border-b border-white/10 pb-6 mb-6">
        <div class="flex items-center justify-between gap-x-6">
            <div>
                <h2 class="text-2xl font-bold text-white mb-4">{{ $job->title }}</h2>
                <p class="text-gray-300 mb-2"><strong>Salary:</strong> {{ $job->salary }}</p>
            </div>

            <div>
                <p>
                    <x-button href="/jobs/{{ $job->id }}/edit">Edit</x-button>
                </p>
            </div>
        </div>
    </div>



</x-layout>
