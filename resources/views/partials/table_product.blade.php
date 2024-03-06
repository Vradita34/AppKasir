<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Kode</th>
            <th>Stok</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produks as $index => $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama_produk }}</td>
                <td>{{ $data->kode_produk }}</td>
                <td>{{ $data->stok }}</td>
                <td>{{ $data->harga }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
