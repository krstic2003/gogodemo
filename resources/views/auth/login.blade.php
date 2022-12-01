@include('header-main')

<x-guestlogin>
    <x-auth-card>
        <x-slot name="logo">
            <div class="inner-logo" >
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </div>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <div class="login-remainders">
                    Ukoliko nemate nalog, registrujte se  <a href="{{ route('register') }}">ovde</a>
                </div>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Lozinka')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">Zapamti me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
               
            </div>

            <div class="login-remainders">
                @if (Route::has('password.request'))
                Zaboravili ste lozinku? Kliknite <a href="{{ route('password.request') }}">
                          ovde za pomoć.
                    </a>
                    <br>
                Kliknite  <a href="{{ route('password.request') }}">
                        ovde da ponovo pošaljete aktivacioni mejl
                    </a>
                @endif
            </div>
            <div class="login-button-wrap">
                <x-button class="login-button">
                    Prijavi se
                </x-button>
            </div>
            
        </form>
    </x-auth-card>
</x-guestlogin>
