<x-OfficeLayout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
        @section('css')
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
            {{--  <link href="{{ asset('css/datatable.css') }}" rel="stylesheet"> --}}
        @endsection

        <style>
            .dataTables_wrapper .dataTables_length select {
                padding-right: 30px;
            }
        </style>


        <div class=" bg-white p-6 rounded-md shadow-md">
            <table id="table_id" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>
                            Nivel
                        </th>
                        <th>
                            usuario_id
                        </th>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Apellido
                        </th>
                        <th>
                            Patrocinador_id
                        </th>
                        <th>
                            fecha
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @for ($i = 0; $i < count($usuarios); $i++)
                        <tr>
                            <td>
                                {{ $user_nivel[$i] }}
                            </td>

                            <td>
                                {{ $usuarios[$i]->id }}
                            </td>

                            <td>
                                {{ $usuarios[$i]->name }}
                            </td>

                            <td>
                                {{ $usuarios[$i]->apellido }}
                            </td>

                            <td>
                                {{ $sponsor[$i] }}
                            </td>

                            <td>
                                {{ $usuarios[$i]->created_at->format('d/m/y') }}
                            </td>

                        </tr>
                    @endfor

                </tbody>
            </table>
        </div>

        @push('js')
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js">
            </script>


            <script>
                $(document).ready(function() {
                    $('#table_id').DataTable({
                        scrollX: true,
                    });
                });
            </script>
        @endpush
    </div>
</x-OfficeLayout>
