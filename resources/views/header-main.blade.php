<div class="header-main flex justify-between">
    <!-- Logo -->
    <div class="shrink-0 flex items-center">
        <a href="{{ url('/') }}">
            <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
        </a>
    </div>
    <div class="login-nav">
        @auth
            <a href="{{ url('/dashboard') }}">Moj Nalog</a>
        @else

            <a class="purple-bold" href="{{ url('/dashboard') }}">Moj Nalog</a>

            <a href="{{ route('login') }}">Prijava</a>
            <a href="{{ route('register') }}">Registracija</a>

        @endauth
        <a href="{{ url('/pomoc') }}">Pomoć</a>
    </div>

</div>

