@extends('layout.main')

@section('container')
    @include('partials.notification_add')
    @include('partials.modal_add_rekapsuara')
    <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="sm:hidden">
            <label for="tabs" class="sr-only">Select tab</label>
            <select id="tabs"
                class="bg-gray-50 border-0 border-b border-gray-200 text-gray-900 text-sm rounded-t-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option>Data Tabel</option>
            </select>
        </div>
        <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-600 dark:text-gray-400 rtl:divide-x-reverse"
            id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
            <li class="w-full">
                <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about"
                    aria-selected="false"
                    class="inline-block w-full p-4 bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Data
                    Tabel</button>
            </li>
        </ul>
        <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">

            {{-- transaksi --}}
            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel"
                aria-labelledby="about-tab">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama TPS
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    No 1
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    No 2
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    No 3
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total Sah
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total Tidak Sah
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total Suara
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datarekap as $data)
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $data->nama_tps }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $data->suara_no1 }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $data->suara_no2 }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $data->suara_no3 }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $data->total_sah_33 }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $data->total_tidaksah_33 }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $data->total_33 }}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            {{-- end transactin --}}
        </div>
    </div>
    {{-- end main --}}
@endsection
