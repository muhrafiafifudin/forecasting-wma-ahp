<table>
    <thead>
        <tr>
            <th align="center" style="border: 1px solid black" valign="middle" rowspan="2">No.</th>
            <th align="center" style="border: 1px solid black" valign="middle" rowspan="2" width="20">Produk</th>
            <th align="center" style="border: 1px solid black" valign="middle" colspan="{{ $count_actual_sale }}">Data Aktual</th>
            <th align="center" style="border: 1px solid black" valign="middle" colspan="{{ $count_wma_forecasting }}">Data Ramalan</th>
            <th align="center" style="border: 1px solid black" valign="middle" rowspan="2" width="15">Ranking</th>
        </tr>
        <tr>
            @foreach ($actual_sales as $actual_sale)
                <th align="center" style="border: 1px solid black" valign="middle" width="15">{{ \Carbon\Carbon::create()->month($actual_sale->month)->monthName }}</th>
            @endforeach

            @foreach ($wma_forecastings as $wma_forecasting)
                <th align="center" style="border: 1px solid black" valign="middle" width="15">{{ \Carbon\Carbon::create()->month($wma_forecasting->month)->monthName }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($products->sortBy('rank') as $product)
            <tr>
                <td align="center" style="border: 1px solid black" valign="middle">{{ $no++ }}</td>
                <td style="border: 1px solid black" valign="middle">{{ $product->product }}</td>

                @foreach ($actual_sales as $actual_sale)
                    <td align="center" style="border: 1px solid black" valign="middle">{{ $actual_sale_results[$product->id][$actual_sale->month][$actual_sale->year] }}</td>
                @endforeach

                @foreach ($wma_forecastings as $wma_forecasting)
                    <td align="center" style="border: 1px solid black" valign="middle">{{ $wma_results[$product->id][$wma_forecasting->month][$wma_forecasting->year] }}</td>
                @endforeach

                <td align="center" style="border: 1px solid black" valign="middle">{{ $product->rank }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
