<div>
    <head>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>

    <div>
        <canvas id="employeeStatusChart"></canvas>
    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('employeeStatusChart').getContext('2d');
            
            var employeesData = @json($employees);
            
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: employeesData.labels,
                    datasets: [{
                        label: 'Cantidad de empleados Activos',
                        data: employeesData.data,
                        backgroundColor: generateRandomColors(employeesData.labels.length),
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    indexAxis: 'y',
                    scales: {
                        x: {
                            beginAtZero: true,
                            maxTicksLimit: 10
                        },
                        y: {
                            offset: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
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

