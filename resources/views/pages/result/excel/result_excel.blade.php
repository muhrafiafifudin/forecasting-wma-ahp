<table>
    <thead>
        <tr>
            <td>No.</td>
            <td>Produk</td>
            <td>Data Aktual</td>
            <td>Data Ramalan</td>
            <td>Ranking</td>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($products as $product)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $no++ }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
