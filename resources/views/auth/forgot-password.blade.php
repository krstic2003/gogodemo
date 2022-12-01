@include('header-main')
<x-guestlogin>
    <x-auth-card>
        <x-slot name="logo">
            <div class="inner-logo">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </div>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            Zaboravili ste šifru? Unesite Vaš email i dobićete link za reset šifre.
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="login-button-wrap">
                <x-button class="login-button">
                    Pošalji link za reset
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guestlogin>
