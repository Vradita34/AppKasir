@extends('layout.main')

@section('container')

    <body class="bg-gray-50 dark:bg-slate-900">
        <!-- Invoice -->
        <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
            <div class="sm:w-11/12 lg:w-3/4 mx-auto">
                <!-- Card -->
                <div class="flex flex-col p-4 sm:p-10 bg-white shadow-md rounded-xl dark:bg-gray-800">
                    <!-- Grid -->
                    <div class="flex justify-between">
                        <div>
                            <svg class="w-10 h-10" width="26" height="26" viewBox="0 0 26 26" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1 26V13C1 6.37258 6.37258 1 13 1C19.6274 1 25 6.37258 25 13C25 19.6274 19.6274 25 13 25H12"
                                    class="stroke-blue-600 dark:stroke-white" stroke="currentColor" stroke-width="2" />
                                <path
                                    d="M5 26V13.16C5 8.65336 8.58172 5 13 5C17.4183 5 21 8.65336 21 13.16C21 17.6666 17.4183 21.32 13 21.32H12"
                                    class="stroke-blue-600 dark:stroke-white" stroke="currentColor" stroke-width="2" />
                                <circle cx="13" cy="13.0214" r="5" fill="currentColor"
                                    class="fill-blue-600 dark:fill-white" />
                            </svg>

                            <h1 class="mt-2 text-lg md:text-xl font-semibold text-blue-600 dark:text-white">Kusuma Inc.
                            </h1>
                        </div>
                        <!-- Col -->

                        <div class="text-end">
                            <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 dark:text-gray-200">Invoice #</h2>
                            <span class="mt-1 block text-gray-500">{{ $nota }}</span>

                            <address class="mt-4 not-italic text-gray-800 dark:text-gray-200">
                                57752, Karanganyar<br>
                                Jawa Tengah, Indonesia<br>
                            </address>
                        </div>
                        <!-- Col -->
                    </div>
                    <!-- End Grid -->

                    <!-- Grid -->
                    <div class="mt-8 grid sm:grid-cols-2 gap-3">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Bill to:</h3>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                {{ $penjualan->nama }}</h3>
                            <address class="mt-2 not-italic text-gray-500">
                                {{ $penjualan->alamat }}<br>
                            </address>
                        </div>
                        <!-- Col -->

                        <div class="sm:text-end space-y-2">
                            <!-- Grid -->
                            <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Invoice date:</dt>
                                    <dd class="col-span-2 text-gray-500">{{ $penjualan->created_at }}</dd>
                                </dl>
                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Due date:</dt>
                                    {{-- <dd class="col-span-2 text-gray-500">{{ $penjualan->created_at }}</dd> --}}
                                </dl>
                            </div>
                            <!-- End Grid -->
                        </div>
                        <!-- Col -->
                    </div>
                    <!-- End Grid -->

                    <!-- Table -->
                    <div class="mt-6">
                        <div class="border border-gray-200 p-4 rounded-lg space-y-4 dark:border-gray-700">
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
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @php
                                        $no = 1;
                                        $total = 0;
                                        $result = 0;
                                    @endphp
                                    @foreach ($detailPenjualan as $index => $item)
                                        <tr class="bg-white hover:bg-gray-50 dark:bg-slate-900 dark:hover:bg-slate-800">
                                            <td class="h-px w-px whitespace-nowrap">
                                                <button type="button" class="block"
                                                    data-hs-overlay="#hs-ai-invoice-modal">
                                                    <span class="block px-6 py-2">
                                                        <span class="font-mono text-sm text-blue-600 dark:text-blue-500">
                                                            {{ $no++ }}
                                                        </span>
                                                    </span>
                                                </button>
                                            </td>
                                            <td class="h-px w-px whitespace-nowrap">
                                                <button type="button" class="block"
                                                    data-hs-overlay="#hs-ai-invoice-modal">
                                                    <span class="block px-6 py-2">
                                                        <span
                                                            class="font-mono text-sm text-blue-600 dark:text-blue-500">#{{ $item->kode_penjualan }}</span>
                                                    </span>
                                                </button>
                                            </td>
                                            <td class="h-px w-px whitespace-nowrap">
                                                <button type="button" class="block"
                                                    data-hs-overlay="#hs-ai-invoice-modal">
                                                    <span class="block px-6 py-2">
                                                        <span class="text-sm text-gray-600 dark:text-gray-400">
                                                            {{ $item->nama_produk }}</span>
                                                    </span>
                                                </button>
                                            </td>
                                            <td class="h-px w-px whitespace-nowrap">
                                                <button type="button" class="block"
                                                    data-hs-overlay="#hs-ai-invoice-modal">
                                                    <span class="block px-6 py-2">
                                                        <span
                                                            class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                                            <svg class="w-2.5 h-2.5" xmlns="http://www.w3.org/2000/svg"
                                                                width="16" height="16" fill="currentColor"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                            </svg>
                                                            {{ $item->jumlah_produk }}
                                                        </span>
                                                    </span>
                                                </button>
                                            </td>
                                            <td class="h-px w-px whitespace-nowrap">
                                                <button type="button" class="block"
                                                    data-hs-overlay="#hs-ai-invoice-modal">
                                                    <span class="block px-6 py-2">
                                                        <span
                                                            class="text-sm text-gray-600 dark:text-gray-400">Rp.{{ number_format($item->harga) }}</span>
                                                    </span>
                                                </button>
                                            </td>
                                            <td class="h-px w-px whitespace-nowrap">
                                                <button type="button" class="block"
                                                    data-hs-overlay="#hs-ai-invoice-modal">
                                                    <span class="block px-6 py-2">
                                                        <span class="text-sm text-gray-600 dark:text-gray-400">
                                                            Rp.{{ number_format($item->harga * $item->jumlah_produk) }}
                                                        </span>
                                                    </span>
                                                </button>
                                            </td>
                                        </tr>
                                        @php
                                            $total = $total + $item->harga * $item->jumlah_produk;
                                            $result = $result + $item->jumlah_produk;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End Table -->

                    <!-- Flex -->
                    <div class="mt-8 flex sm:justify-end">
                        <div class="w-full max-w-2xl sm:text-end space-y-2">
                            <!-- Grid -->
                            <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Subtotal:</dt>
                                    <dd class="col-span-2 text-gray-500">Rp.{{ number_format($total) }}</dd>
                                </dl>

                                <dl class="grid sm:grid-cols-5 gap-x-3">
                                    <dt class="col-span-3 font-semibold text-gray-800 dark:text-gray-200">Total Produk:
                                    </dt>
                                    <dd class="col-span-2 text-gray-500">{{ $result }}</dd>
                                </dl>
                            </div>
                            <!-- End Grid -->
                        </div>
                    </div>
                    <!-- End Flex -->

                    <div class="mt-8 sm:mt-12">
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Thank you!</h4>
                        <p class="text-gray-500">If you have any questions concerning this invoice, use the following
                            contact information:</p>
                        <div class="mt-2">
                            <p class="block text-sm font-medium text-gray-800 dark:text-gray-200">vradita29@gmail.com</p>
                            <p class="block text-sm font-medium text-gray-800 dark:text-gray-200">+1 (062) 109-9222</p>
                        </div>
                    </div>

                    <p class="mt-5 text-sm text-gray-500">© 2022 Preline.</p>
                </div>
                <!-- End Card -->

                <!-- Buttons -->
                <div class="mt-6 flex justify-end gap-x-3">
                    <a class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800"
                        href="{{ route('printInvoice', ['nota' => $nota]) }}">
                        <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                            <polyline points="7 10 12 15 17 10" />
                            <line x1="12" x2="12" y1="15" y2="3" />
                        </svg>
                        Invoice PDF
                    </a>
                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        href="#">
                        <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 6 2 18 2 18 9" />
                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                            <rect width="12" height="8" x="6" y="14" />
                        </svg>
                        Print
                    </a>
                </div>
                <!-- End Buttons -->
            </div>
        </div>
        <!-- End Invoice -->
    </body>
@endsection
