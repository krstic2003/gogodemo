@include('header-main')
<x-guestlogin>
    <x-auth-card>
        <x-slot name="logo">
            <div class="inner-logo">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </div>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            Molimo Vas potvrdite registraciju klikom na link u mejlu koji smo Vam upravo poslali.
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                Link za potvrdu registracije je poslat na Vaš mejl.
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div class="login-button-wrap">
                    <x-button class="login-button">
                        Pošaljite mejl ponovo
                    </x-button>
                </div>
            </form>
            <br>
            
        </div>
        <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Odjava
                </button>
            </form>
    </x-auth-card>
</x-guestlogin>
