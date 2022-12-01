
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
                <form method="POST" action="{{ url('price-page') }}/{{ $price_page->id }}/update">
                    @csrf

                    <!-- Format -->
                    <div class="mt-4">
                        <x-label for="format" :value="__('Format')" />

                        <x-input id="format" class="block mt-1 w-full" type="text" name="format" :value="$price_page->format" required />
                    </div>

                    <!-- Price -->
                    <div class="mt-4">
                        <x-label for="price" :value="__('Cena (din)')" />

                        <x-input id="price" class="block mt-1 w-full" type="text" name="price" :value="$price_page->price" required />
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