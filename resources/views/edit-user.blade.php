
<x-app-layout>

        <div class="py-12">
            <div class="single-form max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        @if (session('status'))
                            <div class="notification">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ url('user') }}/{{ Auth::user()->id }}/update">
                            @csrf

                            <!-- Name -->
                            <div>
                                <x-label for="name" :value="__('Ime i prezime')" />

                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name" required autofocus />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-label for="email" :value="__('Email')" />

                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email" required />
                            </div>

                            <!-- telephone -->
                            <div class="mt-4">
                                <x-label for="telephone" :value="__('Telefon')" />

                                <x-input id="telephone" class="block mt-1 w-full" type="text" name="telephone" :value="$user->telephone" required />
                            </div>

                            <!-- state -->
                            <div class="mt-4">
                                <x-label for="state" :value="__('Država')" />

                                <x-input id="state" class="block mt-1 w-full" type="text" name="state" :value="$user->state"  />
                            </div>

                            <!-- city -->
                            <div class="mt-4">
                                <x-label for="city" :value="__('Grad')" />

                                <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="$user->city"  />
                            </div>

                            <!-- zip -->
                            <div class="mt-4">
                                <x-label for="zip" :value="__('Poštanski broj')" />

                                <x-input id="zip" class="block mt-1 w-full" type="text" name="zip" :value="$user->zip"  />
                            </div>

                            <!-- street -->
                            <div class="mt-4">
                                <x-label for="street" :value="__('Ulica')" />

                                <x-input id="street" class="block mt-1 w-full" type="text" name="street" :value="$user->street"  />
                            </div>

                             <!-- company -->
                             <div class="mt-4">
                                Fizicko lice <input type="radio" name="company" value="fizicko" checked>
                                Pravno lice<input type="radio" name="company" value="pravno">
                            </div>

                            <!-- password reset -->
                            <div class="mt-4">
                                <a href="{{ route('password.request') }}">Promena šifre.</a>
                            </div>
                            <div class="login-button-wrap">
                                <x-button class="login-button">
                                    Potvrdi
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>       
</x-app-layout>