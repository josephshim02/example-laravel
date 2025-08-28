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
          <x-form-input id="first_name" type="text" name="first_name" placeholder="John" :value="old('first_name')" required/>
          <x-form-error name="first_name"/>
        </x-form-field>
        <x-form-field>
          <x-form-label for="last_name">Last name</x-form-label>
          <x-form-input id="last_name" type="text" name="last_name" placeholder="Doe" :value="old('last_name')" required/>
          <x-form-error name="last_name"/>
        </x-form-field>
        <x-form-field>
          <x-form-label for="email">Email address</x-form-label>
          <x-form-input id="email" type="email" name="email" placeholder="$example@email.com" :value="old('email')" required/>
          <x-form-error name="email"/>
        </x-form-field>
        <x-form-field>
          <x-form-label for="password">Password</x-form-label>
          <x-form-input id="password" type="password" name="password"  :value="old('password')" placeholder="password" required/>
          <x-form-error name="password"/>
        </x-form-field>
        <x-form-field>
          <x-form-label for="password_confirmation">Confirm password</x-form-label>
          <x-form-input id="password_confirmation" type="password" name="password_confirmation" :value="old('password_confirmation')" placeholder="confirm password" required/>
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
