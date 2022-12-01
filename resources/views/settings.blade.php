<x-app-layout>


    <div class="py-12">
        <div class="single-form max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @if (session('status'))
                        <div class="notification">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="p-6 bg-white border-b border-gray-200">
                    

                        <h5>Podešavanja</h5>
                        <br>
                        <form method="POST" action="{{ url('settings') }}/{{ $sett->id }}">
                        @csrf
                            <div class="mt-4">
                                <x-label for="company" :value="__('Naziv firme')" />

                                <x-input id="company" class="block mt-1 w-full" type="text" name="company" :value="$sett->company" required />
                            </div>
                            <div class="mt-4">
                                <x-label for="account" :value="__('Broj računa')" />

                                <x-input id="account" class="block mt-1 w-full" type="text" name="account" :value="$sett->account" required />
                            </div>
                            <div class="mt-4">
                                <x-label for="email" :value="__('Email')" />

                                <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="$sett->email" required />
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