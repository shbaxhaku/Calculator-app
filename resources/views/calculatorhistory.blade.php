
<x-app-layout>
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Calculator History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <div>
                        <table id="calculationHistory" class="display">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Expression</th>
                                <th>Result</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#calculationHistory').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('/get-history') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'expression', name: 'expression' }, // Adjust according to your data
                    { data: 'result', name: 'result' }, // Adjust according to your data
                    { data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>


</x-app-layout>
