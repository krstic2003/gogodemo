<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('status'))
                        <div class="notification">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="my-books">
                        <?php $i = 1; ?>
                        @foreach ($books as $book)
                            @if($book->status == 'Aktivan' && $i <= 8 )
                            <div class="my-book">
                                <div class="my-book-inner">
                                    <a href="{{ url('/delete-book') }}/{{ $book->id }}" aria-label="Close" class="btn-close-custom"></a>
                                    <h5>{{ $book->name }}</h5>
                                    Referenca: {{ $book->id }}<br>
                                    Datum kreiranja: {{ date('d-m-Y', strtotime($book->created_at)) }}<br>
                                    Broj strana: {{ $book->pages }}<br><br>

                                    Format: {{ $book->format }}<br>
                                    Povez: {{ $book->cover }}<br>
                                    Cena: {{ $book->price }} din.<br>
                                    Status: {{ $book->status }}<br>
                                    <div class="book-buttons">
                                        <a href="{{ url('/pixie-book') }}/{{ $book->id }}" class="btn btn-primary ">Otvori</a>
                                        <a href="{{ url('/edit-book') }}/{{ $book->id }}" class="btn btn-primary ">Izmeni</a>
                                        <a href="{{ url('/order-book') }}/{{ $book->id }}" class="btn btn-primary ">Poruči</a>
                                    </div>
                                </div>
                                <div class="books-updated">
                                    Poslednji put ažurirano: {{ date('d-m-Y H:m:s', strtotime($book->updated_at)) }}
                                </div>
                            </div>
                            <?php $i++; ?>
                            @endif
                        @endforeach
                        <br>
                    </div>
                    <div class="my-books add-new-book">
                        <a href="{{ route('create-book') }}" class="my-book">
                            <img class="add-new" src="{{ url('/img/plus.png') }}" alt="">
                        </a>
                    </div>
                    <div class="my-books non-active">
                        @foreach ($books as $book)
                            @if($book->status != 'Aktivan')
                            <div class="my-book">
                                <div class="my-book-inner">
                                    <a href="{{ url('/delete-book') }}/{{ $book->id }}" aria-label="Close" class="btn-close-custom"></a>
                                    <h5>{{ $book->name }}</h5>
                                    Referenca: {{ $book->id }}<br>
                                    Datum kreiranja: {{ date('d-m-Y', strtotime($book->created_at)) }}<br>
                                    Broj strana: {{ $book->pages }}<br><br>

                                    Format: {{ $book->format }}<br>
                                    Povez: {{ $book->cover }}<br>
                                    Cena: {{ $book->price }} din.<br>
                                    Status: {{ $book->status }}<br>
                                    <div class="book-buttons">
                                        <a href="{{ url('/pixie-book') }}/{{ $book->id }}" class="btn btn-primary ">Otvori</a>
                                        <a href="{{ url('/edit-book') }}/{{ $book->id }}" class="btn btn-primary ">Izmeni</a>
                                        <a href="{{ url('/order-book') }}/{{ $book->id }}" class="btn btn-primary ">Poruči</a>
                                    </div>
                                </div>
                                <div class="books-updated">
                                    Poslednji put ažurirano: {{ date('d-m-Y H:m:s', strtotime($book->updated_at)) }}
                                </div>
                            </div>
                            @endif
                        @endforeach
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>