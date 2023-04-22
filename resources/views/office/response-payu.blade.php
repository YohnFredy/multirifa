<x-OfficeLayout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">

        @if (strtoupper($firma) == strtoupper($firmacreada))
            <div class=" grid grid-cols-8  pb-10 pt-14">

                <div class=" col-span-8 md:col-start-2 md:col-span-6 lg:col-start-3 lg:col-span-4">
                    <div class="relative overflow-x-auto">
                        <h1 class=" font-bold text-lg text-azul-600 text-center mb-4">Resumen de la transacción</h1>

                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-white dark:bg-gray-700 dark:text-gray-400">
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Estado de la transacción:
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $estadoTx }}
                                    </td>
                                </tr>

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        ID de la transacción:
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $request->transactionId }}
                                    </td>
                                </tr>

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Referencia de venta:
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $request->reference_pol }}
                                    </td>
                                </tr>

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Referencia de la transacción:
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $request->referenceCode }}
                                    </td>
                                </tr>

                                <?php 
                                if($request->pseBank != null) { ?>

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        cus:
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $request->cus }}
                                    </td>
                                </tr>

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Banco:
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $request->pseBank }}
                                    </td>
                                </tr>

                                <?php } ?>

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Valor total:
                                    </th>
                                    <td class="px-6 py-4">
                                        $ {{ number_format($request->TX_VALUE, 1, '.', '') }}
                                    </td>
                                </tr>

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Moneda:
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $request->currency }}
                                    </td>
                                </tr>

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Descripción:
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $request->extra1 }}
                                    </td>
                                </tr>

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Entidad:
                                    </th>
                                    <td class="px-6 py-4">

                                        {{ $request->lapPaymentMethod }}
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <h1>Error validando la firma digital.</h1>
        @endif

        <div class=" text-center pb-8">
            <x-btn-link href="{{ route('office.index') }}"> Finalizar </x-btn-link>
        </div>

    </div>
</x-OfficeLayout>
