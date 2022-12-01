<x-app-layout>


    <div class="py-12">
        <div class="single-form create-b max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('status'))
                        <div class="notification">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="show-book">
                        <h5>Naziv knjige: {{ $book->name }}</h5>
                        <p>Referenca: {{ $book->id }}</p>
                        <p>Povez: {{ $book->cover }}</p>
                        <p>Format: {{ $book->format }}</p>
                        <p>Broj strana: {{ $book->pages }}</p>
                        <p>Datum kreiranja: {{ $book->created_at }}</p>
                        <p>Poslednje ažuriranje: {{ $book->updated_at }}</p>
                        <p>Ime i prezime korisnika: {{ $user->name }}</p>
                        <p>Email korisnika: {{ $user->email }}</p>
                        <p>Status: {{ $status }}</p>
                        <h4>Cena: {{ $book->price }} RSD</h4>
                    </div>
                    <div class="book-buttons">
                        <a href="{{ route('books-admin') }}" class="btn btn-secondary">Izađi</a> 
                    </div>
                    <h5 style="margin-top:30px;">Pošalji štampariji</h5>
                    <form id="send-book-form" method="POST" action="#">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email štamparije:</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ $settings->email }}">
                        </div>
                        <div class="book-buttons">
                            <button type="submit" class="btn btn-primary">Pošalji štampariji</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
