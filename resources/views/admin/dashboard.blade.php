<x-app>
    <x-slot:navbar>
        <x-navbar.siderbar />
    </x-slot:navbar>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

    
    <x-slot:title>
        Estadísticas
    </x-slot:title>


    <!-- Content Wrapper. Contains page content -->
    <div class="">


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <!-- AREA CHART -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Ventas por mes del año actual</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="areaChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- DONUT CHART mas vendidos-->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Top 5 Productos mas vendidos del mes </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="donutChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- PIE CHART -->
                        {{-- <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Pie Chart</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="pieChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div> --}}
                        <!-- /.card -->

                    </div>
                    <!-- /.col (LEFT) -->
                    <div class="col-md-6">
                        <!-- LINE CHART -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Ventas por años</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="lineChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- DONUT CHART mas cancelados-->
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Top 5 Productos mas cancelados del mes </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="donutChart2"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- BAR CHART -->
                        {{-- <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Productos mas vendidos vs productos mas cancelados</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div> --}}
                        <!-- /.card -->

                        <!-- STACKED BAR CHART -->
                        {{-- <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Stacked Bar Chart</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="stackedBarChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div> --}}
                        <!-- /.card -->

                    </div>
                    <!-- /.col (RIGHT) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <script>
        $(function() {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //--------------
            //- AREA CHART -
            //--------------

            // Get context with jQuery - using jQuery's .get() method.
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')


            var areaChartData = { //grafica para ventas por mes del año actual
                labels: @json($meses),
                datasets: [{
                        label: 'total',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: true,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: @json($ventasMes)
                    },
                    {
                        label: 'Ventas estimada',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                         data: [10000, 10000, 10000, 10000, 10000, 10000, 10000, 10000, 10000, 10000, 10000, 10000]
                    },
                ]
            }

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            new Chart(areaChartCanvas, {
                type: 'line',
                data: areaChartData,
                options: areaChartOptions
            })


            //-------------
            //- LINE CHART -
            //--------------

            var areaChartDataA = { //grafica para ventas por años
                labels: @json($anios),
                datasets: [{
                        label: 'total',
                        backgroundColor: 'rgba(60,141,188,0.8)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: true,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: @json($ventasAnio)
                    },
                ]
            }


            var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
            var lineChartOptions = $.extend(true, {}, areaChartOptions)
            var lineChartData = $.extend(true, {}, areaChartDataA)
            lineChartData.datasets[0].fill = false;
            // lineChartData.datasets[1].fill = false;
            lineChartOptions.datasetFill = false

            var lineChart = new Chart(lineChartCanvas, {
                type: 'line',
                data: lineChartData,
                options: lineChartOptions
            })

            //-------------
            //- DONUT CHART -  5 PRODUCTOS AMS VENDIDOS EN EL MESS ACTUAL 
            //PRODUCTOS MAS VENDIDOS(productsNameVendidos2, productsVendidos2)
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
            var donutData = {
                labels: @json($productsNameVendidos2),
                datasets: [{
                    data: @json($productsVendidos2),
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de',
                        '#f56954', '#00a65a', '#f39c12', '#00c0ef',
                    ],
                }]
            }
            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
            })

            //-------------
            //- DONUT CHART -  5 PRODUCTOS AMS cancelados EN EL MESS ACTUAL 
            //PRODUCTOS MAS CANCELADOS(productsNameCancelados2, productsCancelados2)
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var donutChartCanvas2 = $('#donutChart2').get(0).getContext('2d')
            var donutData2 = {
                labels: @json($productsNameCancelados2),
                datasets: [{
                    data: @json($productsCancelados2),
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de',
                        '#f56954', '#00a65a', '#f39c12', '#00c0ef',
                    ],
                }]
            }
            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(donutChartCanvas2, {
                type: 'doughnut',
                data: donutData2,
                options: donutOptions
            })



            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            // var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            // var pieData = donutData;
            // var pieOptions = {
            //     maintainAspectRatio: false,
            //     responsive: true,
            // }
            // //Create pie or douhnut chart
            // // You can switch between pie and douhnut using the method below.
            // new Chart(pieChartCanvas, {
            //     type: 'pie',
            //     data: pieData,
            //     options: pieOptions
            // })

            //-------------
            //- BAR CHART -
            //-------------

            // var areaChartDataProduct = { //grafica para ventas por años
            //     labels: @json($anios),
            //     datasets: [{
            //             label: 'total',
            //             backgroundColor: 'rgba(60,141,188,0.9)',
            //             borderColor: 'rgba(60,141,188,0.8)',
            //             pointRadius: false,
            //             pointColor: '#3b8bba',
            //             pointStrokeColor: 'rgba(60,141,188,1)',
            //             pointHighlightFill: '#fff',
            //             pointHighlightStroke: 'rgba(60,141,188,1)',
            //             data: @json($ventasAnio)
            //         },
            //         {
            //             label: 'venta promedio',
            //             backgroundColor: 'rgba(210, 214, 222, 1)',
            //             borderColor: 'rgba(210, 214, 222, 1)',
            //             pointRadius: false,
            //             pointColor: 'rgba(210, 214, 222, 1)',
            //             pointStrokeColor: '#c1c7d1',
            //             pointHighlightFill: '#fff',
            //             pointHighlightStroke: 'rgba(220,220,220,1)',
            //             data: @json($promedioA)
            //         },
            //     ]
            // }

            // var barChartCanvas = $('#barChart').get(0).getContext('2d')
            // var barChartData = $.extend(true, {}, areaChartDataProduct)
            // var temp0 = areaChartDataProduct.datasets[0]
            // var temp1 = areaChartDataProduct.datasets[1]
            // barChartData.datasets[0] = temp1
            // barChartData.datasets[1] = temp0

            // var barChartOptions = {
            //     responsive: true,
            //     maintainAspectRatio: false,
            //     datasetFill: false
            // }

            // new Chart(barChartCanvas, {
            //     type: 'bar',
            //     data: barChartData,
            //     options: barChartOptions
            // })

            //---------------------
            //- STACKED BAR CHART -
            //---------------------
            // var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
            // var stackedBarChartData = $.extend(true, {}, barChartData)

            // var stackedBarChartOptions = {
            //     responsive: true,
            //     maintainAspectRatio: false,
            //     scales: {
            //         xAxes: [{
            //             stacked: true,
            //         }],
            //         yAxes: [{
            //             stacked: true
            //         }]
            //     }
            // }

            // new Chart(stackedBarChartCanvas, {
            //     type: 'bar',
            //     data: stackedBarChartData,
            //     options: stackedBarChartOptions
            // })
        })
    </script>

</x-app>
