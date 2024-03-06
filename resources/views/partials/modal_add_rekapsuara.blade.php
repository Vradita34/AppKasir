<!-- Modal toggle -->
<button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
    class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Add
    Produk</button>
<!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create New Product
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="{{ route('datarekap.add') }}" method="POST">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-3">
                    <div class="col-span-3">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name
                            TPS</label>
                        <input type="text" name="nama_tps" id="nama_tps"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Type product name" required
                            @error('nama_tps')
                                is-invalid @else is-valid
                            @enderror>
                        @error('nama_tps')
                            <div class="is-invalid"></div>
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh,
                                    snapp!</span> {{ $message }}.</p>
                        @enderror
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                            1</label>
                        <input type="number" name="suara_no1" id="suara_no1"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="0" required
                            @error('suara_no1')
                                is-invalid @else is-valid
                            @enderror>
                        @error('suara_no1')
                            <div class="is-invalid"></div>
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh,
                                    snapp!</span> {{ $message }}.</p>
                        @enderror
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="stok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                            2</label>
                        <input type="number" name="suara_no2" id="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="0" required
                            @error('suara_no2')
                                is-invalid @else is-valid
                            @enderror>
                        @error('suara_no2')
                            <div class="is-invalid"></div>
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh,
                                    snapp!</span> {{ $message }}.</p>
                        @enderror
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="stok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                            3</label>
                        <input type="number" name="suara_no3" id="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="0" required
                            @error('suara_no3')
                                is-invalid @else is-valid
                            @enderror>
                        @error('suara_no3')
                            <div class="is-invalid"></div>
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh,
                                    snapp!</span> {{ $message }}.</p>
                        @enderror
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="stok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">total
                            Suara</label>
                        <input type="number" name="total_33" id="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="0" required
                            @error('total_33')
                                is-invalid @else is-valid
                            @enderror>
                        @error('total_33')
                            <div class="is-invalid"></div>
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh,
                                    snapp!</span> {{ $message }}.</p>
                        @enderror
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="stok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">total
                            Suara Sah</label>
                        <input type="number" name="total_sah_33" id="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="0" required
                            @error('total_sah_33')
                                is-invalid @else is-valid
                            @enderror>
                        @error('total_sah_33')
                            <div class="is-invalid"></div>
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh,
                                    snapp!</span> {{ $message }}.</p>
                        @enderror
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="stok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">total
                            Suara Tidak Sah</label>
                        <input type="number" name="total_tidaksah_33" id="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="0" required
                            @error('total_tidaksah_33')
                                is-invalid @else is-valid
                            @enderror>
                        @error('total_tidaksah_33')
                            <div class="is-invalid"></div>
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh,
                                    snapp!</span> {{ $message }}.</p>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Tambah data Rekap suara
                </button>
            </form>
        </div>
    </div>
</div>
