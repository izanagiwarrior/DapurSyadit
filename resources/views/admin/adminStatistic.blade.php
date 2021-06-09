@extends('layouts.adminApp')

@section('title', 'Admin : Home')
@section('content')
<div class="container-fluid">
    <div class="row p-3">
        <h2>Statistic</h2>
    </div>
    <div class="row p-3">
        <table class="table table-striped">
            <tr class="bg-dark text-white">
                <th style="text-align:center">#</th>
                <th style="text-align:center">Product Name</th>
                <th style="text-align:center">Quantity</th>
            </tr>
            <?php
            $i = 0;
            $temp_label = array();
            $temp_y = array();
            ?>
            @foreach ($order as $index => $product)
            <tr>
                <td style="text-align:center">{{ $i += 1 }}</td>
                @foreach($products as $pd)
                @if($pd->id === $product->product_id)
                <td style="text-align:center">{{ $pd->name }}</td>
                <?php
                array_push($temp_label, $pd->name);
                array_push($temp_y, $product->amount);
                ?>
                @endif
                @endforeach
                <td style="text-align:center">{{ $product->amount }}</td>
            </tr>
            @endforeach
        </table>

        <div class="mt-4" id="chartContainer" style="height: 350px; width: 100%;border-radius: 10px"></div>

        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <script type="text/javascript">
            var js_array = [<?php echo '"' . implode('","', $temp_label) . '"' ?>];
            var js_y = [<?php echo implode(',', $temp_y) ?>];
            var dataString = [];
            for (let i = 0; i < js_y.length; i++) {
                dataString[i] = {
                    label: js_array[i],
                    y: js_y[i]
                };
            }
            window.onload = function() {
                var chart = new CanvasJS.Chart("chartContainer", {
                    title: {
                        text: "Order Statistic"
                    },
                    data: [{
                        // Change type to "doughnut", "line", "splineArea", etc.
                        type: "column",
                        dataPoints: dataString
                    }]
                });
                chart.render();
            }
        </script>
    </div>
</div>
@endsection