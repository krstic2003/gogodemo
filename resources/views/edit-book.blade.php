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
                    <div class="new-book">
                        <h5>Izmena knjige: {{ $book->id }}</h5>
                        <form id="edit-book-form" method="POST" action="{{ url('edit-book') }}/{{ $book->id }}">
                        @csrf
                            <div class="form-group">
                                <label for="name">Ime:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $book->name }}">
                            </div>
                            <div class="form-group">
                                <label for="format">Format:</label>
                                <select class="form-control" id="format" name="format">
                                    <option></option>
                                    <option value="A4 uspravno (200x280)" {{ $book->format == 'A4 uspravno (200x280)' ? 'selected' : '' }}>A4 uspravno (200x280)</option>
                                    <option value="A4 landscape (280x200)" {{ $book->format == 'A4 landscape (280x200)' ? 'selected' : '' }}>A4 landscape (280x200)</option>
                                    <option value="Mala kocka (200x200)" {{ $book->format == 'Mala kocka (200x200)' ? 'selected' : '' }}>Mala kocka (200x200)</option>
                                    <option value="Velika kocka (300x300)" {{ $book->format == 'Velika kocka (300x300)' ? 'selected' : '' }}>Velika kocka (300x300)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cover">Povez:</label>
                                <select class="form-control" id="cover" name="cover">
                                    <option></option>
                                    <option value="Meki povez" {{ $book->cover == 'Meki povez' ? 'selected' : '' }}>Meki povez</option>
                                    <option value="Tvrdi povez" {{ $book->cover == 'Tvrdi povez' ? 'selected' : '' }}>Tvrdi povez</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pages">Broj strana:</label>
                                <select class="form-control" id="pages" name="pages">
                                    @for ($i = 28; $i <= 128; $i = $i + 4)
                                        @if( $i == $book->pages )
                                        <option value="{{ $i }}" selected>{{ $i }}</option>
                                        @else
                                        <option value="{{ $i }}">{{ $i }}</option>
                                        @endif
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                Cena: <span class="total-price">0.00</span> RSD
                                <input type="hidden" name="price" id="total-price" value="{{ $book->price }}">
                            </div>
                            <div class="book-buttons">
                                <button type="submit" class="btn btn-primary">Sačuvaj</button>
                                <a href="{{ route('books') }}" class="btn btn-secondary">Izađi</a>
                            </div>

                        </form>
                    </div>
                    <div style="display:none;">
                        @foreach ($prices_cover as $pc)
                            <div class="prices-cover" data-type="{{ $pc->type }}" data-format="{{ $pc->format }}">{{ $pc->price }}</div>
                        @endforeach
                        @foreach ($prices_page as $pp)
                            <div class="prices-page" data-format="{{ $pp->format }}">{{ $pp->price }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    jQuery(document).ready(function(){
        $("span.total-price").text( $("#total-price").val() );
        $("#edit-book-form").on('change', function(){
            
            var pages = $("#pages").val();
            var format = $("#format").val();
            var cover = $("#cover").val();

            var cover_price = $(".prices-cover[data-type='"+cover+"'][data-format='"+format+"']").text();
            var page_price = $(".prices-page[data-format='"+format+"']").text();

            var final_price = parseFloat(cover_price) + ( parseFloat(page_price) * parseFloat(pages) );

            $(".total-price").text( final_price );
            $("#total-price").val( final_price ).change();

        })
    })
</script>
