<div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- AREA CHART -->
                    <div class="card card-primary" wire:ignore>
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
                    <div class="card card-success" wire:ignore>
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
                            <select {{-- wire:model="miVariable"  --}} wire:model="selectMesVendidos" {{-- wire:change='up' --}}
                                wire:change="actualizarVariable"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-30 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="miSelect">
                                <option value="">Selecciona un mes</option>
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiempre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                            <canvas id="donutChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col (LEFT) -->
                <div class="col-md-6">
                    <!-- LINE CHART -->
                    <div class="card card-info" wire:ignore>
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
                    <div class="card card-danger" wire:ignore>
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
                            <select {{-- wire:model="miVariable"  --}} wire:model="selectMesCancelados" {{-- wire:change='up' --}}
                                wire:change="actualizarVariable2"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-30 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="miSelect">
                                <option value="">Selecciona un mes</option>
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiempre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                            <canvas id="donutChart2"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>

                        </div>
                        <!-- /.card-body -->
                    </div>
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
    document.addEventListener('livewire:load', function() {
        Livewire.on('variableActualizada', function(valor, v2) {
            // Llamar a la función de JavaScript con el valor de la variable
            miFuncionJavaScript(valor, v2);
        });
    });

    function miFuncionJavaScript(valor, v2) {
        // Hacer algo con el valor

        console.log('Valor capturado:', valor);
        console.log('Valor capturado2:', v2);

        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: v2,
            datasets: [{
                data: valor,
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', ],
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
        // ...
    }
</script>

<script>
    document.addEventListener('livewire:load', function() {
        Livewire.on('variableActualizada2', function(valor, v2) {
            // Llamar a la función de JavaScript con el valor de la variable
            miFuncionJavaScript2(valor, v2);
        });
    });

    function miFuncionJavaScript2(valor, v2) {

        console.log('Valor capturado:', valor);
        console.log('Valor capturado2:', v2);

        var donutChartCanvas2 = $('#donutChart2').get(0).getContext('2d')
        var donutData2 = {
            labels: v2,
            datasets: [{
                data: valor,
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de',
                    '#f56954', '#00a65a', '#f39c12', '#00c0ef',
                ],
            }]
        }
        var donutOptions2 = {
            maintainAspectRatio: false,
            responsive: true,

        }

        new Chart(donutChartCanvas2, {
            type: 'doughnut',
            data: donutData2,
            options: donutOptions2
        })
    }
    
</script>
