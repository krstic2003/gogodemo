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
                    <table id="users-table" class="table table-sm p-0 table-hover font-s display table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Ime i prezime</th>
                                <th>Adresa</th>
                                <th>Grad</th>
                                <th>Telefon</th>
                                <th>Firma</th>
                                <th>Rola</th>
                                <th>Izmeni</th>
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
			let table = $('#users-table').DataTable({
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
                ajax: URL + '/users',
                columns: [
                    { data: 'email', name: 'email' },
                    { data: 'name', name: 'name' },
                    { data: 'street', name: 'street'},
                    { data: 'city', name: 'city'},
                    { data: 'telephone', name: 'telephone'},
                    { data: 'company', name: 'company'},
                    { data: 'role_formated', name: 'role_formated'},
                    { data: 'actions', name: 'actions', orderable: false, searchable: false},
                    { data: 'delete', name: 'delete', orderable: false, searchable: false},
                ]
            });
		})
	</script>
