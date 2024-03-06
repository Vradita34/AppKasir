@extends('layout.main')

@section('container')
    @include('partials.modal_add_pelanggan_penjualan')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-200">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No Nota
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nominal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pelanggan
                    </th>
                    {{-- <th scope="col" class="px-6 py-3">
                        Daftar Produk
                    </th> --}}
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penjualan as $index => $out)
                    <tr
                        class="{{ $index % 2 === 0 ? 'odd:bg-white odd:dark:bg-gray-900' : 'even:bg-gray-50 even:dark:bg-gray-800' }} border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 t-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4 ">
                            {{ $out->kode_penjualan }}
                        </td>
                        <td class="px-6 py-4 ">
                            {{ $out->total_harga }}
                        </td>
                        <td class="px-6 py-4 ">
                            {{ $out->nama }}
                        </td>
                        <td class="px-6 py-4 ">
                            <form action="{{ route('penjualan.invoice', ['nota' => $out->kode_penjualan]) }}"
                                method="get">
                                @csrf
                                <button type="submit"
                                    class="text-yellow-300 border border-yellow-700 hover:bg-yellow-400 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-send-check" viewBox="0 0 16 16">
                                        <path
                                            d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372zm-2.54 1.183L5.93 9.363 1.591 6.602z" />
                                        <path
                                            d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
