<x-layout>
  <x-slot:title>
  Register
  </x-slot:title>
<x-slot:heading>
  Register
</x-slot:heading>

<form method="POST" action="/register">
  @csrf
  <div class="space-y-12">
    <div class="border-b border-white/10 pb-12">

      <div class=" grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <x-form-field>
          <x-form-label for="first_name">First name</x-form-label>
          <x-form-input id="first_name" type="text" name="first_name" placeholder="CEO" required/>
          <x-form-error name="first_name"/>
        </x-form-field>
        <x-form-field>
          <x-form-label for="last_name">Last name</x-form-label>
          <x-form-input id="last_name" type="text" name="last_name" placeholder="$100,000" required/>
          <x-form-error name="last_name"/>
        </x-form-field>
        <x-form-field>
          <x-form-label for="email_address">Email address</x-form-label>
          <x-form-input id="email_address" type="email" name="email_address" placeholder="$100,000" required/>
          <x-form-error name="email_address"/>
        </x-form-field>
        <x-form-field>
          <x-form-label for="password">Password</x-form-label>
          <x-form-input id="password" type="password" name="password" placeholder="$100,000" required/>
          <x-form-error name="password"/>
        </x-form-field>
        <x-form-field>
          <x-form-label for="password_confirmation">Confirm password</x-form-label>
          <x-form-input id="password_confirmation" type="password" name="password_confirmation" placeholder="$100,000" required/>
          <x-form-error name="password_confirmation"/>
        </x-form-field>
      </div>


    </div>
  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <a href="/" type="button" class="text-sm/6 font-semibold text-white">Cancel</a>
    <x-form-submit-button>Register</x-form-submit-button>
  </div>
</form>


</x-layout>
