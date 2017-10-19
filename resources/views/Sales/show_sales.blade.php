@extends('layouts.template')
@section('title')
    Ventes
    @endsection
<?php
use App\Sales;
use Carbon\Carbon;
use App\Item;
use App\ItemPrice;
use App\ItemSize;
use App\Subitem;

function countSales($date)
    {
        $compteur = 0;

        $sales = Sales::all()->where('is_active',0);
        foreach ($sales as $row)
            {
                if(strstr($row->created_at,$date))
                    {
                        $compteur++;
                    }
            }
            return $compteur;
    }

//Carbon::setToStringFormat('jS \o\f F, Y g:i:s a'); // 25th of December, 1975 2:15:16 pm
  Carbon::setLocale('fr');
//  Carbon::setToStringFormat('D, d M o');
  Carbon::setToStringFormat('l');
  $now = Carbon::now();
  $i = Carbon::now()->subDay(1);
  $ii = Carbon::now()->subDay(2);
  $iii = Carbon::now()->subDay(3);
  $iv = Carbon::now()->subDay(4);
  $v = Carbon::now()->subDay(5);
  $vi = Carbon::now()->subDay(6);




?>
@section('title')
    Ventes
@endsection
@section('content')
    <script src = 'http://code.jquery.com/jquery-1.11.0.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <style>
        .card .card-block {
            padding: 15px !important;
        }
    </style>
    <div class="chartjs-size-monitor">
        <canvas class="chartjs-render-monitor" id="myChart" width="400px" height="400px"></canvas>
    </div>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        ctx.canvas.width = 1000;
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["{{$vi}}","{{$v}}", "{{$iv}}", "{{$iii}}", "{{$ii}}", "{{$i}}","{{$now}}"],
                datasets: [{
                    label: 'Sales Per Day, This Week',{{Carbon::resetToStringFormat()}}
                    data: [{{countSales(Carbon::now()->subday(6)->toDateString())}},
                        {{countSales(Carbon::now()->subday(5)->toDateString())}},
                        {{countSales(Carbon::now()->subday(4)->toDateString())}},
                        {{countSales(Carbon::now()->subday(3)->toDateString())}},
                        {{countSales(Carbon::now()->subday(2)->toDateString())}},
                        {{countSales(Carbon::now()->subday(1)->toDateString())}},
                        {{countSales(Carbon::now()->toDateString())}}],

                    borderColor: [
                        'rgba(255,0,0,1)',
                    ],
                    backgroundColor: [
                        'rgba(0,0,0,0)'
                    ],
                    borderWidth: 1
                },
                    {
                        label: 'Sales Per Day, Last Week',
                        data: [{{countSales(Carbon::now()->subday(13)->toDateString())}},
                            {{countSales(Carbon::now()->subday(12)->toDateString())}},
                            {{countSales(Carbon::now()->subday(11)->toDateString())}},
                            {{countSales(Carbon::now()->subday(10)->toDateString())}},
                            {{countSales(Carbon::now()->subday(9)->toDateString())}},
                            {{countSales(Carbon::now()->subday(8)->toDateString())}},
                            {{countSales(Carbon::now()->subday(7)->toDateString())}}],

                        borderColor: [
                            'rgba(0,0,255,1)',
                        ],
                        backgroundColor: [
                            'rgba(0,0,0,0)'
                        ],
                        borderWidth: 1
                    }],

            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
@endsection