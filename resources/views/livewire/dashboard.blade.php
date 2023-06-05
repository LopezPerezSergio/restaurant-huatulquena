<div>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    
    <body>
        <canvas id="employee-chart"></canvas>
    </body>
    <script>
        var employeeChart = new Chart(document.getElementById("employee-chart"), {
            type: 'bar',
            data: {
                labels: {!! json_encode($employees['labels']) !!},
                datasets: [{
                    label: 'Cantidad de empleados por rol',
                    data: {!! json_encode($employees['data']) !!},
                    backgroundColor: generateRandomColors({!! count($employees['labels']) !!}),
                    borderColor: 'rgba(0, 0, 0, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        
        function generateRandomColors(length) {
            var colors = [];
            for (var i = 0; i < length; i++) {
                var color = 'rgba(' + Math.floor(Math.random() * 256) + ', ' + Math.floor(Math.random() * 256) + ', ' + Math.floor(Math.random() * 256) + ', 0.2)';
                colors.push(color);
            }
            return colors;
        }
    </script>
</div>
