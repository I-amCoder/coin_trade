@isset($coin)
    <style>
        .chart-container {
            max-width: "100%";
            height: 400px;
            margin: 20px auto;
            border: 1px solid #444;
            padding: 10px;
            background-color: #292929;
            border-radius: 5px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }

        .data-label {
            font-size: 14px;
            color: #fff;
            background-color: rgba(76, 175, 80, 0.8);
            border: 1px solid #4CAF50;
            border-radius: 5px;
            padding: 4px 8px;
            font-weight: bold;
            text-align: center;
        }
    </style>
    <h4>{{ $coin->name }} Graph</h2>
        <div class="container-fluid">
            <div class="chart-container">
                <canvas id="stockChart{{ $coin->id }}"></canvas>
            </div>
        </div>
        @push('script')
            <script>
                var data_{{ $coin->id }} = JSON.parse("{{ $coin->price_jsons }}");
                var labels_{{ $coin->id }} = JSON.parse(he.decode("{{ $coin->chart_labels }}"));
                var current_{{ $coin->name }}_rate = {{ $coin->current_price }};



                // Limit the number of labels and data points to display

                const stockData{{ $coin->id }} = {
                    labels: labels_{{ $coin->id }},
                    datasets: [{
                        label: '{{ $coin->name }} Price',
                        data: data_{{ $coin->id }},
                        borderColor: '#4CAF50',
                        backgroundColor: 'rgba(0, 76, 255, 0.464)',
                        borderWidth: 2,
                        fill: true,
                    }]
                };

                const chartOptions{{ $coin->id }} = {
                    elements: {
                        point: {
                            radius: 0
                        }
                    },
                    hover: {
                        mode: 'index',
                        intersect: false
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            display: true,
                            grid: {
                                display: false,
                            },
                            ticks: {
                                fontColor: '#ccc',
                            },
                        },
                        y: {
                            display: true,
                            grid: {
                                color: '#444',
                            },
                            ticks: {
                                fontColor: '#ccc',
                                beginAtZero: false,
                            },
                        },
                    },
                    aspectRatio: 5 / 3,
                    layout: {
                        padding: {
                            bottom: 16,
                            right: 40,
                            left: 8,
                            top: 20
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        datalabels: {
                            backgroundColor: function(context) {
                                return context.active ? context.dataset.backgroundColor : 'black';
                            },
                            borderColor: function(context) {
                                return context.dataset.backgroundColor;
                            },
                            borderRadius: function(context) {
                                return context.active ? 0 : 1;
                            },
                            borderWidth: 1,
                            color: function(context) {
                                return context.active ? 'white' : "white"
                            },
                            font: {
                                weight: 'bold'
                            },
                            formatter: function(value, context) {
                                value = Math.round(value * 100) / 100;
                                if (context.dataIndex === context.dataset.data.length - 1) {
                                    return context.dataset.label + '\n' + "{{ config('settings.currency_symbol') }}" +
                                        value;
                                } else {
                                    return context.active ?
                                        context.dataset.label + '\n' + "{{ config('settings.currency_symbol') }}" + value :
                                        ''
                                }
                            },
                            offset: 8,
                            padding: function(context) {
                                return (context.dataIndex === context.dataset.data.length - 1 || context.active) ? 10 : 0
                            },

                            textAlign: 'center'
                        }
                    },
                };

                Chart.register(ChartDataLabels);

                // Create the stock-like chart
                const stockChart{{ $coin->id }} = new Chart(document.getElementById('stockChart{{ $coin->id }}'), {
                    type: 'line',
                    data: stockData{{ $coin->id }},
                    options: chartOptions{{ $coin->id }}
                });


                $(document).ready(function() {
                    const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
                        cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
                        encrypted: true
                    });

                    const channel = pusher.subscribe('price-channel-local');
                    channel.bind('price-updated', (updatedPriceData) => {
                        if (updatedPriceData?.coin_id == {{ $coin->id }}) {
                            label = updatedPriceData.label;
                            data = updatedPriceData.price;
                            stockChart{{ $coin->id }}.data.labels.push(label);



                            stockChart{{ $coin->id }}.data.datasets.forEach((dataset) => {
                                dataset.data.push(data);
                                if(  current_{{ $coin->name }}_rate > updatedPriceData.price){
                                    stockChart{{ $coin->id }}.data.datasets[0].borderColor = "#FF0000";

                                }else{
                                    stockChart{{ $coin->id }}.data.datasets[0].borderColor = "#4CAF50";
                                }

                            });

                            current_{{ $coin->name }}_rate = updatedPriceData.price;
                            $(".current_{{ $coin->id }}_rate").html("Current {{ $coin->name }} rate: " + updatedPriceData.price);

                            stockChart{{ $coin->id }}.update();
                        }
                    });
                });
            </script>
        @endpush
    @endisset
