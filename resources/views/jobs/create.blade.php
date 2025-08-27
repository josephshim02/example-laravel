<x-layout>
  <x-slot:title>
  Create jobs
  </x-slot:title>
<x-slot:heading>
  Create Job
</x-slot:heading>

<form method="POST" action="/jobs">
  @csrf
  <div class="space-y-12">
    <div class="border-b border-white/10 pb-12">
      <h2 class="text-base/7 font-semibold text-white">Create a new job</h2>
      <p class="mt-1 text-sm/6 text-gray-400">We just need a few details</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <x-form-field>
          <x-form-label for="title">Job title</x-form-label>
          <x-form-input id="title" type="text" name="title" placeholder="CEO" required/>
          <x-form-error name="title"/>
        </x-form-field>
        <x-form-field>
          <x-form-label for="salary">Salary</x-form-label>
          <x-form-input id="salary" type="text" name="salary" placeholder="$100,000" required/>
          <x-form-error name="salary"/>
        </x-form-field>
      </div>

      {{-- <div class="mt-10">
        @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-red-500"> {{ $error }}</li>
            @endforeach
        </ul>
      @endif
      </div> --}}

    </div>
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm/6 font-semibold text-white">Cancel</button>
    <x-form-submit-button>Save</x-form-submit-button>
  </div>
</form>


</x-layout>
