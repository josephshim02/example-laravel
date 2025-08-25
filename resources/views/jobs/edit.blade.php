<x-layout>
    <x-slot:title>
        Edit Job: {{ $job->title }}
    </x-slot:title>
    <x-slot:heading>
        Edit Job: {{ $job->title }}
    </x-slot:heading>
<form method="POST" action="/jobs/{{ $job->id }}">
  @csrf
  @method('PATCH')
  {{-- browsers only natively support GET and POST methods. To use PUT, PATCH, or DELETE, you need to use directive --}}
  <div class="space-y-12">
    <div class="border-b border-white/10 pb-12">
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <label for="title" class="block text-sm/6 font-medium text-white">Job title</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
              <input
              id="title"
              type="text"
              value="{{ $job->title }}"
              name="title"
              placeholder="Shift leader"
              class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" required/>
            </div>
          </div>
          @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div class="sm:col-span-4">
          <label for="salary" class="block text-sm/6 font-medium text-white">Salary</label>
          <div class="mt-2">
            <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
              <input id="salary"
              type="text"
              value="{{ $job->salary }}"
              name="salary"
              placeholder="$50,000 Per Year"
              class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" required/>
            </div>
          </div>
          @error('salary')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>

          @enderror
        </div>
      </div>
    </div>
  </div>

  <div class="mt-6 flex items-center justify-between gap-x-6">
    <div class="flex items-center gap-x-6">
        <button form="delete-form" type="submit" class="rounded-md bg-amber-800 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-800 hover:bg-amber-900">Delete</button>
    </div>
    <div class="flex items-center gap-x-6">
        <div>
            <x-button href="/jobs/{{ $job->id }}">Cancel</x-button>
        </div>
        <div>
            <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 hover:bg-indigo-700">Update</button>
        </div>
    </div>
  </div>
</form>
<form id="delete-form" method="POST" action="/jobs/{{ $job->id }}" class="hidden">
    @csrf
    @method("DELETE")
</form>

</x-layout>
