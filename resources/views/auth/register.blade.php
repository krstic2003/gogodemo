@include('header-main')
<x-guestlogin>
    <x-auth-card>
        <x-slot name="logo">
            <div class="inner-logo">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </div>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="Ime i prezime" autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Email" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password"
                                placeholder="Šifra" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" 
                                placeholder="Potvrdi šifru"
                                required />
            </div>

            <!-- telephone -->
            <div class="mt-4">
                <x-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" placeholder="Telefon" :value="old('telephone')" />
            </div>

            <!-- state -->
            <div class="mt-4">
                <x-input id="state" class="block mt-1 w-full" type="text" name="state" placeholder="Država" :value="old('state')" />
            </div>

            <!-- city -->
            <div class="mt-4">
                <x-input id="city" class="block mt-1 w-full" type="text" name="city" placeholder="Grad" :value="old('city')" />
            </div>

            <!-- zip -->
            <div class="mt-4">
                <x-input id="zip" class="block mt-1 w-full" type="text" name="zip" placeholder="Poštanski broj" :value="old('zip')" />
            </div>

            <!-- street -->
            <div class="mt-4">
                <x-input id="street" class="block mt-1 w-full" type="text" name="street" placeholder="Ulica" :value="old('street')" />
            </div>

            <!-- company -->
            <div class="mt-4">
                Fizicko lice <input type="radio" name="company" value="fizicko" checked>
                Pravno lice<input type="radio" name="company" value="pravno">
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    Imate nalog?
                </a>

                
            </div>
            <div class="login-button-wrap">
                <x-button class="login-button">
                    Registracija
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guestlogin>
