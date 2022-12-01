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
                    <table id="books-admin-table" class="table table-sm p-0 table-hover font-s display table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>Referenca</th>
                                <th>Knjiga</th>
                                <th>Datum<br>naručivanja</th>
                                <th>Ime i<br>prezime</th>
                                <th>Telefon</th>
                                <th>Ukupno<br>(din.)</th>
                                <th>Način<br>plaćanja</th>
                                <th>Status</th>
                                <th>PDF</th>
                                <th>Otvori</th>
                                <th>Obriši</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

	<script>
		jQuery(document).ready(function(){
            console.log(URL + '/js/lang/sr.json');
			let table = $('#books-admin-table').DataTable({
                dom: '<"top"iflp<"clear">>rt<"bottom"ip<"clear">>',
                processing: true,
                serverSide: true,
                info: false,
                responsive: true,
                pagingType: "full_numbers",
                pageLength: 10,
                lengthMenu: [[10, 250, 500, 1000], [10, 250, 500, 1000]],
                order: [[ 0, "desc" ]],
                language: {
                    url: URL + '/js/lang/sr.json'
                },
                ajax: URL + '/books-admin',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'order_date', name: 'order_date' },
                    { data: 'order_name', name: 'order_name' },
                    { data: 'order_tel', name: 'order_tel' },
                    { data: 'price', name: 'price' },
                    { data: 'payment', name: 'payment' },
                    { data: 'status', name: 'status' },
                    { data: 'pdf', name: 'pdf', orderable: false, searchable: false},
                    { data: 'actions', name: 'actions', orderable: false, searchable: false},
                    { data: 'delete', name: 'delete', orderable: false, searchable: false},
                ]
            });
		})
	</script>
