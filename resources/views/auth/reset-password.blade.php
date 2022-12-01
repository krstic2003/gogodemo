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

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Šifra')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Potvrdi šifru')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="login-button-wrap">
                <x-button class="login-button">
                    Resetuj šifru
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guestlogin>
