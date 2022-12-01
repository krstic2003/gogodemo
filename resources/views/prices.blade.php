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
                    <h5>Cene poveza:</h5>
                    <table id="prices-cover-table" class="table table-sm p-0 table-hover font-s display table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>Povez</th>
                                <th>Format</th>
                                <th>Cena (din)</th>
                                <th>Izmeni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prices_cover as $pc)
                            <tr>
                                <td>{{ $pc->type }}</td>
                                <td>{{ $pc->format }}</td>
                                <td>{{ $pc->price }}</td>
                                <td><a href="{{ url('price-cover') }}/{{ $pc->id }}">Izmeni</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h5 style="margin-top:30px;">Cene po stranici:</h5>
                    <table id="prices-table" class="table table-sm p-0 table-hover font-s display table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>Format</th>
                                <th>Cena (din)</th>
                                <th>Izmeni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prices_page as $pp)
                            <tr>
                                <td>{{ $pp->format }}</td>
                                <td>{{ $pp->price }}</td>
                                <td><a href="{{ url('price-page') }}/{{ $pp->id }}">Izmeni</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>