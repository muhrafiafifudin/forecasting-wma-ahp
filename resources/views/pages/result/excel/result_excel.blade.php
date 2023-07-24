<table>
    <thead>
        <tr>
            <th rowspan="2">No.</th>
            <th rowspan="2">Produk</th>
            <th colspan="{{ $count_actual_sale }}">Data Aktual</th>
            <th colspan="{{ $count_wma_forecasting }}">Data Ramalan</th>
        </tr>
        <tr>
            @foreach ($actual_sales as $actual_sale)
                <th>{{ \Carbon\Carbon::create()->month($actual_sale->month)->monthName }}</th>
            @endforeach

            @foreach ($wma_forecastings as $wma_forecasting)
                <th>{{ \Carbon\Carbon::create()->month($wma_forecasting->month)->monthName }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($products as $product)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $product->product }}</td>

                @foreach ($actual_sales as $actual_sale)
                    <td>{{ $actual_sale_results[$product->id][$actual_sale->month][$actual_sale->year] }}</td>
                @endforeach

                @foreach ($wma_forecastings as $wma_forecasting)
                    <td>{{ $wma_results[$product->id][$wma_forecasting->month][$wma_forecasting->year] }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
