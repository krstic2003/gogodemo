<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @if (session('status'))
                        <div class="notification">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="p-6 bg-white border-b border-gray-200">
                    

                        <h5>Hvala na porudžbini</h5>
                        <br>
                        <p>
                            Metod plaćanja:  Prilikom preuzimanja.
                        </p>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
