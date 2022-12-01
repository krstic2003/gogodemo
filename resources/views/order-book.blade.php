<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @if (session('status'))
                        <div class="notification">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="p-6 bg-white border-b border-gray-200 order-book">
                    
                    <div class="col-md-6">
                        <h5>Detalji knjige</h5>
                        <p>Naziv: {{ $book->name }}</p>
                        <p>Referenca: {{ $book->id }}</p>
                        <p>Povez: {{ $book->cover }}</p>
                        <p>Format: {{ $book->format }}</p>
                        <p>Broj strana: {{ $book->pages }}</p>
                        <p>Datum kreiranja: {{ $book->created_at }}</p>
                        <p>Poslednje ažuriranje: {{ $book->updated_at }}</p>
                        <p>Ime i prezime korisnika: {{ $user->name }}</p>
                        <p>Email korisnika: {{ $user->email }}</p>
                        <p>Cena: {{ $book->price }} RSD</p>
                    </div>
                    <div class="col-md-6">
                        <h5>Detalji o dostavi</h5>
                        <form method="POST" action="{{ url('order-submit') }}/{{ $book->id }}">
                            @csrf

                            <!-- Name -->
                            <div>
                                <x-label for="shipping_name" :value="__('Ime i prezime')" />

                                <x-input id="shipping_name" class="block mt-1 w-full" type="text" name="shipping_name" :value="$user->name" required autofocus />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-label for="shipping_email" :value="__('Email')" />

                                <x-input id="shipping_email" class="block mt-1 w-full" type="email" name="shipping_email" :value="$user->email" required />
                            </div>

                            <!-- telephone -->
                            <div class="mt-4">
                                <x-label for="shipping_tel" :value="__('Telefon')" />

                                <x-input id="shipping_tel" class="block mt-1 w-full" type="text" name="shipping_tel" :value="$user->telephone" required />
                            </div>

                            <!-- state -->
                            <div class="mt-4">
                                <x-label for="shipping_state" :value="__('Država')" />

                                <x-input id="shipping_state" class="block mt-1 w-full" type="text" name="shipping_state" :value="$user->state"  />
                            </div>

                            <!-- city -->
                            <div class="mt-4">
                                <x-label for="shipping_city" :value="__('Grad')" />

                                <x-input id="shipping_city" class="block mt-1 w-full" type="text" name="shipping_city" :value="$user->city"  />
                            </div>

                            <!-- zip -->
                            <div class="mt-4">
                                <x-label for="shipping_zip" :value="__('Poštanski broj')" />

                                <x-input id="shipping_zip" class="block mt-1 w-full" type="text" name="shipping_zip" :value="$user->zip"  />
                            </div>

                            <!-- street -->
                            <div class="mt-4">
                                <x-label for="shipping_street" :value="__('Ulica')" />

                                <x-input id="shipping_street" class="block mt-1 w-full" type="text" name="shipping_street" :value="$user->street"  />
                            </div>

                            <!-- qty -->
                            <div class="mt-4">
                                <x-label for="qty" :value="__('Količina')" />

                                <x-input id="qty" class="block mt-1 w-full" type="number" name="qty" :value="1"  />
                            </div>

                            <!-- payment -->
                            <div class="mt-4">
                                <x-label for="payment" :value="__('Način plaćanja')" />

                                <select name="payment" id="payment" class="form-control">
                                    <option value="cod">Pouzećem</option>
                                    <option value="ips">Generisanjem IPS koda</option>
                                    <option value="inovice">Generisanjem uplatnice</option>
                                </select>
                            </div>


                            <div class="book-buttons">
                                    <a href="{{ route('books') }}" class="btn btn-secondary">Izađi</a>
                                    <button type="submit" class="btn btn-primary">Poruči</button>
                            </div>
                        </form>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
