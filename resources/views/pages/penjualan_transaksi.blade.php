@extends('layout.main')

@section('container')
    @include('partials.notification_add')
    {{-- <div class="grid grid-cols-2 gap-4 mb-4"> --}}
    <div
        class="w-full max-w-full p-2 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form action="{{ route('penjualan.add.keranjang') }}" method="POST">
            @method('post')
            @csrf
            <input type="hidden" name="id_users" id="id_users" value="{{ auth()->user()->id }}">
            <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="{{ $id_pelanggan }}">
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nota</label>
                    <input type="text" id="nota"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="{{ $nota['nota'] }}" value="{{ $nota['nota'] }}" required disabled>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Pelanggan</label>
                    <input type="text" value="{{ $namaPelanggan->nama }}" placeholder="{{ $namaPelanggan->nama }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required disabled>
                </div>
                <input type="hidden" name="kode_penjualan" value="{{ $nota['nota'] }}">
                <div>
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                        option</label>
                    <select id="selectProduk" name="id_produk"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Pilih Produk</option>
                        @foreach ($produk as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_produk }} | {{ $item->kode_produk }} |
                                {{ $item->stok }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                        Yang
                        dijual</label>
                    <input type="number" name="jumlah" id="jumlah"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        required placeholder="0">
                </div>
            </div>
            <button type="submit"
                class="text-white bg-[#FF9119] hover:bg-[#FF9119]/80 focus:ring-4 focus:outline-none focus:ring-[#FF9119]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#FF9119]/80 dark:focus:ring-[#FF9119]/40 me-2 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-bag-plus" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5" />
                    <path
                        d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                </svg>
                Tambah Keranjang
            </button>
        </form>
    </div>
    {{-- </div> --}}
    <!-- Table Section -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Card -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div
                        class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-slate-900 dark:border-gray-700">
                        <!-- Header -->
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                                    Keranjang Belanja
                                </h2>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    kelola Keranjang belanja anda >_< ! </p>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                </div>
                            </div>
                        </div>
                        <!-- End Header -->
                        <!-- Table -->
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-slate-900">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                No
                                            </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                Kode Produk
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                Nama Produk
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                Jumlah
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                Harga
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                Total
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-end"></th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @php
                                    $cek = 0;
                                    $no = 1;
                                    $total = 0;
                                    $result = 0;
                                @endphp
                                @foreach ($temp as $index => $item)
                                    <tr class="bg-white hover:bg-gray-50 dark:bg-slate-900 dark:hover:bg-slate-800">
                                        <td class="h-px w-px whitespace-nowrap">
                                            <button type="button" class="block" data-hs-overlay="#hs-ai-invoice-modal">
                                                <span class="block px-6 py-2">
                                                    <span class="font-mono text-sm text-blue-600 dark:text-blue-500">
                                                        {{ $no++ }}
                                                    </span>
                                                </span>
                                            </button>
                                        </td>
                                        <td class="h-px w-px whitespace-nowrap">
                                            <button type="button" class="block" data-hs-overlay="#hs-ai-invoice-modal">
                                                <span class="block px-6 py-2">
                                                    <span
                                                        class="font-mono text-sm text-blue-600 dark:text-blue-500">#{{ $item->kode_produk }}</span>
                                                </span>
                                            </button>
                                        </td>
                                        <td class="h-px w-px whitespace-nowrap">
                                            <button type="button" class="block" data-hs-overlay="#hs-ai-invoice-modal">
                                                <span class="block px-6 py-2">
                                                    <span class="text-sm text-gray-600 dark:text-gray-400">
                                                        {{ $item->nama_produk }}</span>
                                                </span>
                                            </button>
                                        </td>
                                        <td class="h-px w-px whitespace-nowrap">
                                            <button type="button" class="block" data-hs-overlay="#hs-ai-invoice-modal">
                                                <span class="block px-6 py-2">
                                                    <span
                                                        class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                                        <svg class="w-2.5 h-2.5" xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                        </svg>
                                                        {{ $item->jumlah }}
                                                    </span>
                                                    @if ($item->jumlah > $item->stok)
                                                        <span
                                                            class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">insufficient
                                                            stock</span>
                                                        @php
                                                            $cek = 1;
                                                        @endphp
                                                    @endif
                                                </span>
                                            </button>
                                        </td>
                                        <td class="h-px w-px whitespace-nowrap">
                                            <button type="button" class="block" data-hs-overlay="#hs-ai-invoice-modal">
                                                <span class="block px-6 py-2">
                                                    <span
                                                        class="text-sm text-gray-600 dark:text-gray-400">Rp.{{ number_format($item->harga) }}</span>
                                                </span>
                                            </button>
                                        </td>
                                        <td class="h-px w-px whitespace-nowrap">
                                            <button type="button" class="block" data-hs-overlay="#hs-ai-invoice-modal">
                                                <span class="block px-6 py-2">
                                                    <span class="text-sm text-gray-600 dark:text-gray-400">
                                                        Rp.{{ number_format($item->harga * $item->jumlah) }}
                                                    </span>
                                                </span>
                                            </button>
                                        </td>
                                        <td class="h-px w-px whitespace-nowrap">
                                            <form
                                                action="{{ route('penjualan.delete.keranjang', ['id_temp' => $item->id]) }}"
                                                method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit"
                                                    onclick="confirm('yakin ingin menghapus produk dari keranjang !')"
                                                    class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">
                                                    Remove
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                        $total = $total + $item->harga * $item->jumlah;
                                        $result = $result + $item->jumlah;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table -->
                        <!-- Footer -->
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-gray-700">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    jumlah produk
                                    <span
                                        class="font-semibold text-gray-800 dark:text-gray-200">{{ $result }}</span>
                                </p>
                            </div>
                            <div>
                                <div class="inline-flex gap-x-2">
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        Total Harga
                                        <span
                                            class="font-semibold text-gray-800 dark:text-gray-200">Rp.{{ number_format($total) }}</span>
                                    </p>
                                    @if ($temp && count($temp) > 0 && $cek == 0)
                                        <form action="{{ route('penjualan.transaksi.bayar') }}" method="POST">
                                            @method('post')
                                            @csrf
                                            <input type="hidden" name="pelanggan_id" value="{{ $id_pelanggan }}">
                                            <input type="hidden" name="kode_penjualan" value="{{ $nota['nota'] }}">
                                            <input type="hidden" name="total_harga" value="{{ $total }}">
                                            <button type="submit"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 18 21">
                                                    <path
                                                        d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                                                </svg>
                                                Buy now
                                            </button>
                                        </form>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <!-- End Footer -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Table Section -->
@endsection
