
    <div>
        <head>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        </head>
        <div>
            <canvas id="pieChart"></canvas>
        </div>
        
        
            <script>
                //PARA QUE SE GENERAR UNA Y OTRA VEZ ASI CAMBIA LOS COLORES Y NO SE LE ASIGANA UNO POR UNO
                document.addEventListener('livewire:load', function () {
                    Livewire.on('refreshChart', function () {
                        renderChart();
                    });
        
                    function renderChart() {
                        var data = @json($products);
        
                        var ctx = document.getElementById('pieChart').getContext('2d');
                        new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: data.labels,
                                datasets: [{
                                    data: data.data,
                                    backgroundColor: generateRandomColors(data.labels.length),
                                }],
                            },
                        });
                    }
        //PARA GENERAR COLORES RANDOM SOLO QUE ALGUNOS SE VEN FEOS XD
                    function generateRandomColors(length) {
                        var colors = [];
                        for (var i = 0; i < length; i++) {
                            colors.push('#' + Math.floor(Math.random() * 16777215).toString(16));
                        }
                        return colors;
                    }
        
                    renderChart();
                });
            </script>
        
        
    </div>
